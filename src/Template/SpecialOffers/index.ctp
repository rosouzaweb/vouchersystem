<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpecialOffer[]|\Cake\Collection\CollectionInterface $specialOffers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Special Offer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vouchers'), ['controller' => 'Vouchers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Voucher'), ['controller' => 'Vouchers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="specialOffers index large-9 medium-8 columns content">
    <h3><?= __('Special Offers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fixed_percentage') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($specialOffers as $specialOffer): ?>
            <tr>
                <td><?= $this->Number->format($specialOffer->id) ?></td>
                <td><?= h($specialOffer->name) ?></td>
                <td><?= $this->Number->format($specialOffer->fixed_percentage) ?></td>
                <td><?= h($specialOffer->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $specialOffer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $specialOffer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $specialOffer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specialOffer->id)]) ?>
                </td>
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
