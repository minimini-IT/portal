<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Chronos\Chronos;
use Cake\Chronos\Date;
use Cake\I18n\Time;

/**
 * Carendar component
 * 指定した月の日付をリストで返すデフフォルトは当月
 * @param int $addMonth　当月から見て、何ヶ月前（後）かを数字で渡す
 * @return array $daysOfMonth 対象となる月の日付のリスト(Chronosオブジェクトのリスト)を返す
 * 　　　　　　　　　　　     デフォルトは当月のリストを返す
 */
class CarendarComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function getDaysWeek(int $addWeek = 0){
      //一週間分の日付と対応する曜日
      $dayWeek = [];

      //Date::today()：本日のオブジェクト作成
      //2019-11-09
      $today = Date::today();
      /* 時間は正確にする　nowで2分くらい遅れてる
      $date = Date::today("Y/m/d H:i:s");
       */


      if($addWeek !== 0){

        //どっちか
        $today = $today->addDays(7 * $addWeek);
      }

      //dayWeek[0]：テーブルの日付表示用
      //dayWeek[1]：リンクパラメータ用の年月日
      for($i = 0; $i < 7; $i++){
        switch($today->addDays($i)->dayOfWeek){
        case 7:
          $dayWeek[0][$i] = $today->addDays($i)->format("n/j") . "</br>(日)";
          $dayWeek[1][$i] = $today->addDays($i)->format("Ymd");
          break;
        case 1:
          $dayWeek[0][$i] = $today->addDays($i)->format("n/j") . "</br>(月)";
          $dayWeek[1][$i] = $today->addDays($i)->format("Ymd");
          break;
        case 2:
          $dayWeek[0][$i] = $today->addDays($i)->format("n/j") . "</br>(火)";
          $dayWeek[1][$i] = $today->addDays($i)->format("Ymd");
          break;
        case 3:
          $dayWeek[0][$i] = $today->addDays($i)->format("n/j") . "</br>(水)";
          $dayWeek[1][$i] = $today->addDays($i)->format("Ymd");
          break;
        case 4:
          $dayWeek[0][$i] = $today->addDays($i)->format("n/j") . "</br>(木)";
          $dayWeek[1][$i] = $today->addDays($i)->format("Ymd");
          break;
        case 5:
          $dayWeek[0][$i] = $today->addDays($i)->format("n/j") . "</br>(金)";
          $dayWeek[1][$i] = $today->addDays($i)->format("Ymd");
          break;
        case 6:
          $dayWeek[0][$i] = $today->addDays($i)->format("n/j") . "</br>(土)";
          $dayWeek[1][$i] = $today->addDays($i)->format("Ymd");
          break;
        }
      }
      //前の週
      $subWeek = $addWeek;
      if($subWeek === 1){
        array_unshift($dayWeek[0], "<a href='/ReservationDatetimes'><<前の週 </a>");
      }elseif($subWeek > 0){
        $subWeek -= 1;
        array_unshift($dayWeek[0], "<a href='{$subWeek}'><<前の週 </a>");
      }else{
        array_unshift($dayWeek[0], "<p><<前の週 </p>");
      }

      //次の週
      $addWeek += 1;
      if($addWeek == 1){
        array_push($dayWeek[0], "<a href='/ReservationDatetimes/{$addWeek}'> 次の週>></a>");
      }elseif($addWeek >= 9){
        array_push($dayWeek[0], "<p> 次の週>></p>");
      }else{
        array_push($dayWeek[0], "<a href='{$addWeek}'> 次の週>></a>");
      }

      //format"j"で０なし
      return $dayWeek;
    }


}
