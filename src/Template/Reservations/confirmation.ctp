<div class="reservations index large-9 medium-8 columns content">
    <h3><?= __('予約情報の確認') ?></h3>
        <p><?= $reservation_confirmation["name"] ?></p>
        <p><?= $reservation_menu ?></p>
        <p><?= $reservation_confirmation["tel"] ?></p>
        <p><?= $reservation_confirmation["mail"] ?></p>
        <p><?= $datetime->format("Y年m月d日 H時i分") ?></p>
    <h3><?= __('この情報で予約してよろしいですか？') ?></h3>
    <?php //$this->Form->postLink(__("はい"), ['controller' => 'Reservations', 'action' => 'add'], ["data" => $reservation_confirmation]) ?>
    <?= $this->Form->postLink(__("はい"), ['controller' => 'ReservationDatetimes', 'action' => 'add']) ?>
    <?= $this->Html->link(__("いいえ"), ['controller' => 'ReservationDatetimes', 'action' => 'index']) ?>
</div>
