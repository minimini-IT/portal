<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reservation'), ['action' => 'edit', $reservation->reservations_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reservation'), ['action' => 'delete', $reservation->reservations_id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->reservations_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reservations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Menus'), ['controller' => 'Menus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu'), ['controller' => 'Menus', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reservations view large-9 medium-8 columns content">
    <h3><?= h($reservation->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($reservation->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Menu') ?></th>
            <td><?= $reservation->has('menu') ? $this->Html->link($reservation->menu->menu, ['controller' => 'Menus', 'action' => 'view', $reservation->menu->menus_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tel') ?></th>
            <td><?= h($reservation->tel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mail') ?></th>
            <td><?= h($reservation->mail) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reservations Id') ?></th>
            <td><?= $this->Number->format($reservation->reservations_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reservation Datetimes Id') ?></th>
            <td><?= $this->Number->format($reservation->reservation_datetimes_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($reservation->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($reservation->modified) ?></td>
        </tr>
    </table>
</div>
