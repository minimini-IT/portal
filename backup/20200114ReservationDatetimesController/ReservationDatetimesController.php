<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Chronos\Chronos;

class ReservationDatetimesController extends AppController
{
  public function index(int $addWeek = 0){
      
      //$this->log(, LOG_DEBUG);

      //今日から１週間の日付取り出し
      $this->Carendar = $this->loadComponent("Carendar");
      $carendar_params = $this->Carendar->getDaysWeek($addWeek);
      $link_params = $carendar_params;
      $daysWeek = [];
      $daysWeek = $carendar_params[0];

      //検索する日付
      $year = date("Y");
      $start_day_length = strpos($link_params[0][1], "</br>");
      $end_day_length = strpos($link_params[0][7], "</br>");
      $start_day = $year . "/" . substr($link_params[0][1], 0, $start_day_length);
      $end_day = $year . "/" . substr($link_params[0][7], 0, $end_day_length);

      //予約時間検索
      $this->loadModels(["ReservationDatetimes", "Menus"]);
      $reservationDatetimes = TableRegistry::getTableLocator()->get("ReservationDatetimes");
      $reservationDatetimes = $reservationDatetimes->find()
        ->select(["reservation_datetime"])
        ->where([
          "reservation_datetime between :start and :end"
        ])
        ->bind(":start", $start_day, "datetime")
        ->bind(":end", $end_day, "datetime")
        ->all();

      //一週間分の日付
      $week = [];
      for($i = 0; $i < 7; $i++){
          $week[] = $link_params[1][$i];
      }

      $reserved = [];
      foreach($reservationDatetimes as $reservationDatetime){
        $reserved[] = $reservationDatetime->reservation_datetime->format("YmdHi");
      }

      //テーブルに表示する時間
      $time = [["10:00"],["10:30"],["11:00"],["11:30"],["12:00"],["12:30"],["13:00"],["13:30"],["14:00"],["14:30"],["15:00"],
               ["15:30"],["16:00"],["16:30"],["17:00"],["17:30"],["18:00"],["18:30"],["19:00"],["19:30"],["20:00"],["20:30"]];

      //リンクパラメータ用の時間
      $link_time = ["1000","1030","1100","1130","1200","1230","1300","1330","1400","1430","1500",
               "1530","1600","1630","1700","1730","1800","1830","1900","1930","2000","2030"];

      /*
      $menu_time = TableRegistry::getTableLocator()->get("Menus");
      $menu_time = $menu_time->find()
        ->select(["menus_id", "menu_time"])
        ->where([
          "reservation_datetime between :start and :end"
        ])
        ->bind(":start", $start_day, "datetime")
        ->bind(":end", $end_day, "datetime")
        ->all();
       */

      $this->set(compact('daysWeek', "time", "week", "link_params", "link_time", "reserved"));
  }

  public function add(){
      $reservationDatetime = $this->ReservationDatetimes->newEntity();
      if ($this->request->is('post')) {
          $session = $this->request->session();
          $data = $session->read("Reservation.datetime");
          $entity_data = ["reservation_datetime" => $data->format("Y-m-d H:i")];
          $query_data = $data->format("Y-m-d H:i");

          $reservationDatetime = $this->ReservationDatetimes->patchEntity($reservationDatetime, $entity_data);
          if ($this->ReservationDatetimes->save($reservationDatetime)) {
              //予約した時間のid確認
              $reservation_datetimes_id = $this->ReservationDatetimes->find('list', ['limit' => 1])
                ->select(["reservation_datetimes_id"])
                ->where(["reservation_datetime" => $query_data])
                ->first();

              $this->Flash->success(__('The menu has been saved.'));

              return $this->redirect(["controller" => "Reservations", 'action' => 'reservation', $reservation_datetimes_id]);
          }
          $session->destroy();
          $this->Flash->error(__('The menu could not be saved. Please, try again.'));
          return $this->redirect(['action' => 'index']);
      }

  }
  
}
