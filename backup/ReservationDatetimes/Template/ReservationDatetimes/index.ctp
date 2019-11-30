<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReservationDatetime[]|\Cake\Collection\CollectionInterface $reservationDatetimes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Reservation Datetime'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reservationDatetimes index large-9 medium-8 columns content">
    <h3><?= __('Reservation Datetimes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('reservation_datetimes_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reservation_datetime') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservationDatetimes as $reservationDatetime): ?>
            <tr>
                <td><?= $this->Number->format($reservationDatetime->reservation_datetimes_id) ?></td>
                <!--<td><?= h($reservationDatetime->reservation_datetime) ?></td>-->
                <td><?= $reservationDatetime->reservation_datetime->format("Y-m-d H:i") ?></td>
                <td><?= h($reservationDatetime->created) ?></td>
                <td><?= h($reservationDatetime->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $reservationDatetime->reservation_datetimes_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reservationDatetime->reservation_datetimes_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reservationDatetime->reservation_datetimes_id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservationDatetime->reservation_datetimes_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
