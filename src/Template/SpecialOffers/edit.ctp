<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpecialOffer $specialOffer
 */
?>

<div class="specialOffers form large-9 medium-8 columns content">
    <?= $this->Form->create($specialOffer) ?>
    <fieldset>
        <legend><?= __('Edit Special Offer') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('fixed_percentage');
        ?>
    </fieldset>
    <?= $this->Form->button("Save",["class" => "btn btn-md btn-info"]) ?>
    <?= $this->Form->end() ?>
</div>
