<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipient $recipient
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Recipient'), ['action' => 'edit', $recipient->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Recipient'), ['action' => 'delete', $recipient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipient->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Recipients'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recipient'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vouchers'), ['controller' => 'Vouchers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Voucher'), ['controller' => 'Vouchers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="recipients view large-9 medium-8 columns content">
    <h3><?= h($recipient->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($recipient->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($recipient->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($recipient->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Vouchers') ?></h4>
        <?php if (!empty($recipient->vouchers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Recipient Id') ?></th>
                <th scope="col"><?= __('Special Offer Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Expiration Date') ?></th>
                <th scope="col"><?= __('Used') ?></th>
                <th scope="col"><?= __('Date Usage') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($recipient->vouchers as $vouchers): ?>
            <tr>
                <td><?= h($vouchers->id) ?></td>
                <td><?= h($vouchers->recipient_id) ?></td>
                <td><?= h($vouchers->special_offer_id) ?></td>
                <td><?= h($vouchers->code) ?></td>
                <td><?= h($vouchers->expiration_date) ?></td>
                <td><?= h($vouchers->used) ?></td>
                <td><?= h($vouchers->date_usage) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Vouchers', 'action' => 'view', $vouchers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Vouchers', 'action' => 'edit', $vouchers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Vouchers', 'action' => 'delete', $vouchers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vouchers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
