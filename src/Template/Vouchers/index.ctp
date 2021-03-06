<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Voucher[]|\Cake\Collection\CollectionInterface $vouchers
 */
?>

<div class="vouchers index large-9 medium-8 columns content">
    <h3><?= __('Vouchers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('recipient_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('special_offer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expiration_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('used') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_usage') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vouchers as $voucher): ?>
            <tr>
                <td><?= $this->Number->format($voucher->id) ?></td>
                <td><?= $voucher->has('recipient') ? $this->Html->link($voucher->recipient->name, ['controller' => 'Recipients', 'action' => 'view', $voucher->recipient->id]) : '' ?></td>
                <td><?= $voucher->has('special_offer') ? $this->Html->link($voucher->special_offer->name, ['controller' => 'SpecialOffers', 'action' => 'view', $voucher->special_offer->id]) : '' ?></td>
                <td><?= h($voucher->code) ?></td>
                <td><?= h($voucher->expiration_date) ?></td>
                <td><?= h($voucher->used) ?></td>
                <td><?= h($voucher->date_usage) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
