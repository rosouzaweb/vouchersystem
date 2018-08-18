<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpecialOffer $specialOffer
 */
?>
<div class="specialOffers view large-9 medium-8 columns content">
    <h3><?= h($specialOffer->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($specialOffer->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($specialOffer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fixed Percentage') ?></th>
            <td><?= $this->Number->format($specialOffer->fixed_percentage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($specialOffer->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <?php if (!empty($specialOffer->vouchers)): ?>
                <h4><?= __('Related Vouchers') ?></h4>

        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Recipient Id') ?></th>
                <th scope="col"><?= __('Special Offer Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Expiration Date') ?></th>
                <th scope="col"><?= __('Used') ?></th>
                <th scope="col"><?= __('Date Usage (Limit)') ?></th>
            </tr>
            <?php foreach ($specialOffer->vouchers as $vouchers): ?>
            <tr>
                <td><?= h($vouchers->recipient_id) ?></td>
                <td><?= h($vouchers->special_offer_id) ?></td>
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
