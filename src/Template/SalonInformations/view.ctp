<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SalonInformation $salonInformation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Salon Information'), ['action' => 'edit', $salonInformation->salon_informations_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Salon Information'), ['action' => 'delete', $salonInformation->salon_informations_id], ['confirm' => __('Are you sure you want to delete # {0}?', $salonInformation->salon_informations_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Salon Informations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Salon Information'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Municipalities'), ['controller' => 'Municipalities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Municipality'), ['controller' => 'Municipalities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="salonInformations view large-9 medium-8 columns content">
    <h3><?= h($salonInformation->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($salonInformation->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Municipality') ?></th>
            <td><?= $salonInformation->has('municipality') ? $this->Html->link($salonInformation->municipality->name, ['controller' => 'Municipalities', 'action' => 'view', $salonInformation->municipality->municipalities_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tel') ?></th>
            <td><?= h($salonInformation->tel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Business Hour') ?></th>
            <td><?= h($salonInformation->business_hour) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Street Address') ?></th>
            <td><?= h($salonInformation->street_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Regular Holiday') ?></th>
            <td><?= h($salonInformation->regular_holiday) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Salon Informations Id') ?></th>
            <td><?= $this->Number->format($salonInformation->salon_informations_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number Of Staff') ?></th>
            <td><?= $this->Number->format($salonInformation->number_of_staff) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number Of Seat') ?></th>
            <td><?= $this->Number->format($salonInformation->number_of_seat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number Of Parking') ?></th>
            <td><?= $this->Number->format($salonInformation->number_of_parking) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($salonInformation->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($salonInformation->modified) ?></td>
        </tr>
    </table>
</div>
