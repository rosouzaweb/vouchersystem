<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipient[]|\Cake\Collection\CollectionInterface $recipients
 */
?>

<div class="recipients index large-9 medium-8 columns content">
    <div class="row">
	    <div class="col">
		    <h3><?= __('Recipients') ?></h3>
	    </div>
	    <div class="col text-right">
		   <?= $this->Html->link("New Recipient", ["action" => "add"], ["class" => "btn btn-info btn-sm"]);?>
	    </div>
    </div>
    
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recipients as $recipient): ?>
            <tr>
                <td><?= $this->Number->format($recipient->id) ?></td>
                <td><?= h($recipient->name) ?></td>
                <td><?= h($recipient->email) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $recipient->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $recipient->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $recipient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recipient->id)]) ?>
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
