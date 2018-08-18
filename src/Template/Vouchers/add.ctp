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
    <?= $this->Form->create($voucher) ?>
    <fieldset>
        <legend><?= __('Add Voucher') ?></legend>
        <?php
            echo $this->Form->control('recipient_id', ['options' => $recipients]);
            echo $this->Form->control('special_offer_id', ['options' => $specialOffers]);
            echo $this->Form->control('code');
            echo $this->Form->control('expiration_date');
            echo $this->Form->control('used');
            echo $this->Form->control('date_usage', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
