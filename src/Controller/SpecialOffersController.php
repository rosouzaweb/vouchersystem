<?php
namespace App\Controller;
use Cake\I18n\Time;

use App\Controller\AppController;

/**
 * SpecialOffers Controller
 *
 * @property \App\Model\Table\SpecialOffersTable $SpecialOffers
 *
 * @method \App\Model\Entity\SpecialOffer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SpecialOffersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $specialOffers = $this->paginate($this->SpecialOffers);

        $this->set(compact('specialOffers'));
    }

    /**
     * View method
     *
     * @param string|null $id Special Offer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $specialOffer = $this->SpecialOffers->get($id, [
            'contain' => ['Vouchers']
        ]);

        $this->set('specialOffer', $specialOffer);
    }

 /**
     * Add method
     * Once a Special Offer is created, it generates a voucher for each Recipients on the database
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $specialOffer = $this->SpecialOffers->newEntity();
        if ($this->request->is('post')) {
            $specialOffer = $this->SpecialOffers->patchEntity($specialOffer, $this->request->getData());

            if ($this->SpecialOffers->save($specialOffer)) {
                $this->loadModel("Recipients");
	            $recipients = $this->Recipients->find("list");
	            
	            //If there is more than one recipient on database
	            if(!empty($recipients) && count($recipients) >=1){
			        //Create a Voucher for each recipients
			        $this->loadModel("Vouchers");
			        foreach($recipients as $key => $recipient){
			            $voucherData["code"] = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 10));
			            $voucherData["recipient_id"] = $key;
			            $voucherData["special_offer_id"] = $specialOffer->id;
			            $voucherData["used"] = "N";
			            
			            $voucher = $this->Vouchers->newEntity();
			            $voucher = $this->Vouchers->patchEntity($voucher, $voucherData);
			            $this->Vouchers->save($voucher);
		            }
	            }
                $this->Flash->success(__('The special offer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The special offer could not be saved. Please, try again.'));
        }
        $this->set(compact('specialOffer'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Special Offer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $specialOffer = $this->SpecialOffers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $specialOffer = $this->SpecialOffers->patchEntity($specialOffer, $this->request->getData());
            if ($this->SpecialOffers->save($specialOffer)) {
                $this->Flash->success(__('The special offer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The special offer could not be saved. Please, try again.'));
        }
        $this->set(compact('specialOffer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Special Offer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $specialOffer = $this->SpecialOffers->get($id);
        if ($this->SpecialOffers->delete($specialOffer)) {
            $this->Flash->success(__('The special offer has been deleted.'));
        } else {
            $this->Flash->error(__('The special offer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
