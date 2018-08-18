<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recipient $recipient
 */
?>
<div class="recipients form large-9 medium-8 columns content">
    <?= $this->Form->create($recipient) ?>
    <fieldset>
        <legend><?= __('Add Recipient') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('email');
        ?>
    </fieldset>
    <?= $this->Form->button("Save",["class" => "btn btn-md btn-info"]) ?>
    <?= $this->Form->end() ?>
</div>
