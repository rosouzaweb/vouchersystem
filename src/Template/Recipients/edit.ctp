<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipient $recipient
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $recipient->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $recipient->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Recipients'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vouchers'), ['controller' => 'Vouchers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Voucher'), ['controller' => 'Vouchers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recipients form large-9 medium-8 columns content">
    <?= $this->Form->create($recipient) ?>
    <fieldset>
        <legend><?= __('Edit Recipient') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
