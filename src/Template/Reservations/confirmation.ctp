<div class="reservations index large-9 medium-8 columns content">
    <h3><?= __('予約情報の確認') ?></h3>
        <p><?= $reservation_confirmation["name"] ?></p>
        <p><?= $reservation_confirmation["menu"] ?></p>
        <p><?= $reservation_confirmation["tel"] ?></p>
        <p><?= $reservation_confirmation["mail"] ?></p>
        <p><?= $reservation_confirmation["reservation_datetime"] ?></p>
    <h3><?= __('この情報で予約してよろしいですか？') ?></h3>
    <?= $this->Form->postLink(__("はい"), ['controller' => 'Reservations', 'action' => 'add'], ["data" => $reservation_confirmation]) ?>
    <?= $this->Html->link(__("いいえ"), ['controller' => 'ReservationDatetimes', 'action' => 'index']) ?>
</div>
