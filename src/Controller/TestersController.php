<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Chronos\Chronos;

class TestersController extends AppController
{
  public function index(int $addWeek = 0){
      
      //$this->log(, LOG_DEBUG);
    
    
      //デフォルト全て丸
      $check = array_fill(0, 7, array_fill(0, 22, array("◯")));
      //$check = array_fill(0, 7, array_fill(0, 22, array("<a href='Testers/reserved/{$w}-{$t}'>'◯'</a>")));

      //今日から１週間の日付取り出し
      $this->Carendar = $this->loadComponent("Carendar");
      //$daysWeek = $this->Carendar->getDaysWeek($addWeek);
      $carendar_params = $this->Carendar->getDaysWeek($addWeek);
      //$link_params = $daysWeek;
      $link_params = $carendar_params;
      $daysWeek = [];
      $daysWeek = $carendar_params[0];
      /*
      for($i = 0; $i < 9; $i++){
        array_pop($daysWeek[$i]);
      }
       */



      //検索する日付
      $year = date("Y");
      $length = strpos($link_params[0][1], "</br>");
      $start_day = $year . "/" . substr($link_params[0][1], 0, $length);
      $end_day = $year . "/" . substr($link_params[0][7], 0, $length);

      //予約時間検索
      $this->loadModels(["ReservationDatetimes"]);
      $reservationDatetimes = TableRegistry::getTableLocator()->get("ReservationDatetimes");
      $reservationDatetimes = $reservationDatetimes->find()
        ->select(["reservation_datetime"])
        ->where([
          "reservation_datetime between :start and :end"
        ])
        ->bind(":start", $start_day, "datetime")
        ->bind(":end", $end_day, "datetime")
        ->all();

      //日付一覧作成  
      //$reserved_week = $link_params;
      //array_shift($reserved_week);
      //array_pop($reserved_week);
      //一週間分の日付
      $week = [];
      for($i = 0; $i < 7; $i++){
          $week[] = $link_params[1][$i];
        /*
          $length = strpos($link_params[0][$i], "</br>");
          $week[] = substr($link_params[0][$i], 0, $length);
         */
      }
      /*
      foreach($reserved_week as $day){
          $length = strpos($day[0], "</br>");
          $week[] = [substr($day[0], 0, $length), $day[1]];
      }
       */

      /*
      $time = ["10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00",
               "15:30","16:00","16:30","17:00","17:30","18:00","18:30","19:00","19:30","20:00","20:30"];
      //必要なさげ
      foreach($reservationDatetimes as $reservationDatetime){
          //checkの第一配列番号
          $reserved = $reservationDatetime->reservation_datetime->format("m/d");
          $week_array_location = array_search($reserved, $week);

          //checkの第二配列番号
          $reserved = $reservationDatetime->reservation_datetime->format("H:i");
          $check_array_location = array_search($reserved, $time);

          //予約済みの時間は✖︎
          $check[$week_array_location][$check_array_location] = ["✖︎"];
      }
       */
      $reserved = [];
      foreach($reservationDatetimes as $reservationDatetime){
        $reserved[] = $reservationDatetime->reservation_datetime->format("YmdHi");
      }
      $this->log("---reserved---", LOG_DEBUG);
      $this->log($reserved, LOG_DEBUG);

      //テーブルに表示する時間
      $time = [["10:00"],["10:30"],["11:00"],["11:30"],["12:00"],["12:30"],["13:00"],["13:30"],["14:00"],["14:30"],["15:00"],
               ["15:30"],["16:00"],["16:30"],["17:00"],["17:30"],["18:00"],["18:30"],["19:00"],["19:30"],["20:00"],["20:30"]];

      //リンクパラメータ用の時間
      $link_time = ["1000","1030","1100","1130","1200","1230","1300","1330","1400","1430","1500",
               "1530","1600","1630","1700","1730","1800","1830","1900","1930","2000","2030"];

      $this->set(compact('daysWeek', "time", "check", "week", "link_params", "link_time", "reserved"));
  }
}
