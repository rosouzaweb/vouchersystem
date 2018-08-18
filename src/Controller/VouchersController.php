<?php
namespace App\Controller;
use Cake\I18n\Time;

use App\Controller\AppController;

/**
 * Vouchers Controller
 *
 * @property \App\Model\Table\VouchersTable $Vouchers
 *
 * @method \App\Model\Entity\Voucher[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VouchersController extends AppController
{
	
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Recipients', 'SpecialOffers']
        ];
        $vouchers = $this->paginate($this->Vouchers);

        $this->set(compact('vouchers'));
    }

    /**
     * View method
     *
     * @param string|null $id Voucher id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $voucher = $this->Vouchers->get($id, [
            'contain' => ['Recipients', 'SpecialOffers']
        ]);

        $this->set('voucher', $voucher);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $voucher = $this->Vouchers->newEntity();
        if ($this->request->is('post')) {
            $voucher = $this->Vouchers->patchEntity($voucher, $this->request->getData());
            if ($this->Vouchers->save($voucher)) {
                $this->Flash->success(__('The voucher has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The voucher could not be saved. Please, try again.'));
        }
        $recipients = $this->Vouchers->Recipients->find('list', ['limit' => 200]);
        $specialOffers = $this->Vouchers->SpecialOffers->find('list', ['limit' => 200]);
        $this->set(compact('voucher', 'recipients', 'specialOffers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Voucher id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $voucher = $this->Vouchers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $voucher = $this->Vouchers->patchEntity($voucher, $this->request->getData());
            if ($this->Vouchers->save($voucher)) {
                $this->Flash->success(__('The voucher has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The voucher could not be saved. Please, try again.'));
        }
        $recipients = $this->Vouchers->Recipients->find('list', ['limit' => 200]);
        $specialOffers = $this->Vouchers->SpecialOffers->find('list', ['limit' => 200]);
        $this->set(compact('voucher', 'recipients', 'specialOffers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Voucher id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $voucher = $this->Vouchers->get($id);
        if ($this->Vouchers->delete($voucher)) {
            $this->Flash->success(__('The voucher has been deleted.'));
        } else {
            $this->Flash->error(__('The voucher could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Verify and redeem voucher method
     *
     * A REQUEST must has code
     *
     * @param string|null $id Voucher id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function verify($id = null)
    {
	    $code = $this->request->query('code');
	    $email = $this->request->query('email');
	    
	    if(isset($code) && isset($email)){
		    $voucher = $this->Vouchers->find("all")->where(["Vouchers.code" => $code,"Recipients.email" => $email])->contain(["SpecialOffers", "Recipients"])->first();
	
			if (!empty($voucher)){
				$today = new Time('now');
				if($voucher["used"] === "N"){
					$voucherEntity = $this->Vouchers->get($voucher["id"]);
					$voucherEntity->used = "Y";
					$voucherEntity->expiration_date =  new Time('+15 days');
					$voucherEntity->date_usage = new Time('now');
					$this->Vouchers->save($voucherEntity);
					$this->Flash->success('Valid voucher. Enjoy your discount!', ["key" => "success"]);
				}else{
		            $this->Flash->error('Voucher already used.', ["key" => "used"]);					
				}
			}else{
	            $this->Flash->error('Invalid Voucher Code or wrong email address.', ["key" => "invalid"]);
			}		
		}else{
			if(isset($email)){
				$vouchers = $this->Vouchers->find("all")->where(["Vouchers.used" => "N","Recipients.email" => $email])->contain(["SpecialOffers", "Recipients"])->toArray();
				}
			}
		
        $this->set(compact('voucher','vouchers'));
    }
}
