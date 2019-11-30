<?php
$a = array_fill(0, 2, array_fill(0, 2, "test </br>"));
echo "---前---\n";
var_dump($a);
/*
array_pop($a);
 */
for($i = 0; $i <= 1; $i++){
    array_pop($a[$i]);
}
/*
foreach($a as $d){
  array_pop($d);
  $d = $d;
}
 */
echo "---後---\n";
var_dump($a);
//$b = array_fill(0, 2, "<a href='/Testers'><<前の週 </a>", "");
/*
$c = ["<a href='/Testers'><<前の週 </a>", ""];
array_unshift($a, $c);
var_dump($a);
array_shift($a);
 */
//var_dump($a);
/*
$w = [];
foreach($a as $d){
  $length = strpos($d[0], "</br>");
  $w[] = [substr($d[0], 0, $length), $d[1]];
}
var_dump($w);
 */
          /*
      $week = [];
      foreach($reserved_week as $day){
          $length = strpos($day[0], "</br>");
          $week[] = substr($day[0], 0, $length);
          $
      }
           */
?>
