<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation[]|\Cake\Collection\CollectionInterface $reservations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Menus'), ['controller' => 'Menus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menu'), ['controller' => 'Menus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reservations index large-9 medium-8 columns content">
    <h3><?= __('Reservations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('reservations_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('menus_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mail') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reservation_datetimes_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation): ?>
            <tr>
                <td><?= $this->Number->format($reservation->reservations_id) ?></td>
                <td><?= h($reservation->name) ?></td>
                <td><?= $reservation->has('menu') ? $this->Html->link($reservation->menu->menu, ['controller' => 'Menus', 'action' => 'view', $reservation->menu->menus_id]) : '' ?></td>
                <td><?= h($reservation->tel) ?></td>
                <td><?= h($reservation->mail) ?></td>
                <td><?= h($reservation->created) ?></td>
                <td><?= h($reservation->modified) ?></td>
                <td><?= $this->Number->format($reservation->reservation_datetimes_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $reservation->reservations_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reservation->reservations_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reservation->reservations_id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->reservations_id)]) ?>
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
