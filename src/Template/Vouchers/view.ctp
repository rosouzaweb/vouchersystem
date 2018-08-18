<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Voucher $voucher
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Voucher'), ['action' => 'edit', $voucher->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Voucher'), ['action' => 'delete', $voucher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $voucher->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vouchers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Voucher'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recipients'), ['controller' => 'Recipients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recipient'), ['controller' => 'Recipients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Special Offers'), ['controller' => 'SpecialOffers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Special Offer'), ['controller' => 'SpecialOffers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vouchers view large-9 medium-8 columns content">
    <h3><?= h($voucher->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Recipient') ?></th>
            <td><?= $voucher->has('recipient') ? $this->Html->link($voucher->recipient->name, ['controller' => 'Recipients', 'action' => 'view', $voucher->recipient->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Special Offer') ?></th>
            <td><?= $voucher->has('special_offer') ? $this->Html->link($voucher->special_offer->name, ['controller' => 'SpecialOffers', 'action' => 'view', $voucher->special_offer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($voucher->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Used') ?></th>
            <td><?= h($voucher->used) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($voucher->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expiration Date') ?></th>
            <td><?= h($voucher->expiration_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Usage') ?></th>
            <td><?= h($voucher->date_usage) ?></td>
        </tr>
    </table>
</div>
