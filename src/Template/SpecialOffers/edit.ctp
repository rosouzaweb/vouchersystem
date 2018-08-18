<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpecialOffer $specialOffer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $specialOffer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $specialOffer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Special Offers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vouchers'), ['controller' => 'Vouchers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Voucher'), ['controller' => 'Vouchers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="specialOffers form large-9 medium-8 columns content">
    <?= $this->Form->create($specialOffer) ?>
    <fieldset>
        <legend><?= __('Edit Special Offer') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('fixed_percentage');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
