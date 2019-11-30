<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $reservation->reservations_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->reservations_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Menus'), ['controller' => 'Menus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menu'), ['controller' => 'Menus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reservations form large-9 medium-8 columns content">
    <?= $this->Form->create($reservation) ?>
    <fieldset>
        <legend><?= __('Edit Reservation') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('menus_id', ['options' => $menus]);
            echo $this->Form->control('tel');
            echo $this->Form->control('mail');
            echo $this->Form->control('reservation_datetimes_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
