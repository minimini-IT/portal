<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReservationDatetime $reservationDatetime
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reservation Datetime'), ['action' => 'edit', $reservationDatetime->reservation_datetimes_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reservation Datetime'), ['action' => 'delete', $reservationDatetime->reservation_datetimes_id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservationDatetime->reservation_datetimes_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reservation Datetimes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservation Datetime'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reservationDatetimes view large-9 medium-8 columns content">
    <h3><?= h($reservationDatetime->reservation_datetimes_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Reservation Datetimes Id') ?></th>
            <td><?= $this->Number->format($reservationDatetime->reservation_datetimes_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reservation Datetime') ?></th>
            <td><?= h($reservationDatetime->reservation_datetime) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($reservationDatetime->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($reservationDatetime->modified) ?></td>
        </tr>
    </table>
</div>
