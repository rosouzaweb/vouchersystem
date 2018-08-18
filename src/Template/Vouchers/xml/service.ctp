<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Voucher $voucher
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Vouchers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Recipients'), ['controller' => 'Recipients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recipient'), ['controller' => 'Recipients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Special Offers'), ['controller' => 'SpecialOffers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Special Offer'), ['controller' => 'SpecialOffers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vouchers form large-9 medium-8 columns content">
   <?php 
		$xml = Xml::fromArray(['response' => $voucher]);
		echo $xml->asXML();
	?>
</div>
