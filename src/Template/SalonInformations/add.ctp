<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SalonInformation $salonInformation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Salon Informations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Municipalities'), ['controller' => 'Municipalities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Municipality'), ['controller' => 'Municipalities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="salonInformations form large-9 medium-8 columns content">
    <?= $this->Form->create($salonInformation) ?>
    <fieldset>
        <legend><?= __('Add Salon Information') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('municipalities_id', ['options' => $municipalities]);
            echo $this->Form->control('tel');
            echo $this->Form->control('business_hour');
            echo $this->Form->control('street_address');
            echo $this->Form->control('regular_holiday');
            echo $this->Form->control('number_of_staff');
            echo $this->Form->control('number_of_seat');
            echo $this->Form->control('number_of_parking');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
