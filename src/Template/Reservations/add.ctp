<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Reservations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Menus'), ['controller' => 'Menus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menu'), ['controller' => 'Menus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reservations form large-9 medium-8 columns content">
<p>予約日時</p>
<p><?= $datetime->format("Y年m月d日 H時i分") ?></p>
<?= $this->Form->create($reservation, [
      //"controller" => "Reservations",
      "action" => "confirmation"
    ]) ?>
    <fieldset>
        <legend><?= __('Add Reservation') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('menus_id', ['options' => $menus]);
            echo $this->Form->control('tel');
            echo $this->Form->control('mail');
            //echo $this->Form->control('reservation_datetime', ["type" => "hidden", "value" => $reservation_datetime->format("Y/m/d H:i")]);
            //echo $this->Form->control('reservation_datetimes_id', ["type" => "hidden"]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
