<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Voucher $voucher
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List Vouchers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Voucher'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recipients'), ['controller' => 'Recipients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recipient'), ['controller' => 'Recipients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Special Offers'), ['controller' => 'SpecialOffers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Special Offer'), ['controller' => 'SpecialOffers', 'action' => 'add']) ?> </li>
    </ul>
</nav>

<div class="vouchers view large-9 medium-8 columns content text-center">
	<?php 
		if(isset($this->request["url"]["code"]) && isset($this->request["url"]["email"])){
		$answer = array();
		$used = $this->Flash->render("used");
		$invalid = $this->Flash->render("invalid");
		$success = $this->Flash->render("success");
		if(isset($voucher) && !empty($voucher) && $success <> null){
		$answer["result"] = "Voucher successfully redeemed"; 
		echo $success;
	?>
			<div class="row">
				<div class="col">
					<p>Congratulations, <b><?= $voucher["recipient"]["name"]?></b>! Voucher redeemed successfully.</p>
					<p>Your voucher is valid now and can be used until <b><?= $voucher["expiration_date"]?></b></p>	
				</div>
			</div>
			<div class="row">
				<div class="col">
					<h4>Special Offer</h4>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<h5><?= $voucher["special_offer"]["name"]?></h5>
				</div>
				<div class="col">
					<h5><?= $voucher["special_offer"]["fixed_percentage"]?>% Off</h5>
				</div>
			</div>
		
	<?php }else{ 
			if($used <> null){
				$answer["result"] = "Voucher already used";
				echo $used;			
			}
			if($invalid <> null){
				$answer["result"] = "Voucher invalid or mal-formed";
				echo $invalid;
			}
		}?>
	<?php 

		$answer["request"] = $this->Url->build($this->request->getRequestTarget());
		$answer["code"] = $this->request["url"]["code"];
		$answer["email"] = $this->request["url"]["email"];
		
		$json = json_encode($answer);
		}elseif(isset($this->request["url"]["email"])){
			if(!empty($vouchers)){?>
				<h4>Available vouchers for the email address: <b><?=$this->request["url"]["email"]?></b></h4>		
					<b>
						<div class="row">
							<div class="col">Special Offer</div>
							<div class="col">Voucher Code</div>
							<div class="col">Fixed Percentage</div>
						</div>
					</b>
						<?php 
					foreach($vouchers as $voucher){?>
					<div class="row">
						<div class="col"><?= $voucher["special_offer"]["name"]?></div>
						<div class="col"><?= strtoupper($voucher["code"])?></div>
						<div class="col"><?= $voucher["special_offer"]["fixed_percentage"]?>%</div>
					</div>
					<?php }
				?>						
			<?php }
		}	?>	
		
</div>
