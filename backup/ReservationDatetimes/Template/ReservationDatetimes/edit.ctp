<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReservationDatetime $reservationDatetime
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $reservationDatetime->reservation_datetimes_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reservationDatetime->reservation_datetimes_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Reservation Datetimes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="reservationDatetimes form large-9 medium-8 columns content">
    <?= $this->Form->create($reservationDatetime) ?>
    <fieldset>
        <legend><?= __('Edit Reservation Datetime') ?></legend>
        <?php
            echo $this->Form->control('reservation_datetime');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
