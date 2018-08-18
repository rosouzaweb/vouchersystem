<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipient $recipient
 */
?>

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

    </table>
    <div class="related">
        <h4><?= __('Related Vouchers') ?></h4>
        <?php if (!empty($recipient->vouchers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Recipient Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Expiration Date') ?></th>
                <th scope="col"><?= __('Used') ?></th>
                <th scope="col"><?= __('Date Usage (Limit)') ?></th>
            </tr>
            <?php foreach ($recipient->vouchers as $vouchers): ?>
            <tr>
                <td><?= h($vouchers->recipient_id) ?></td>
                <td><?= h($vouchers->code) ?></td>
                <td><?= h($vouchers->expiration_date) ?></td>
                <td><?= h($vouchers->used) ?></td>
                <td><?= h($vouchers->date_usage) ?></td>
                           </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
