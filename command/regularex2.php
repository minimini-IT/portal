<?php
$date = "2019/03/01";
if(preg_match("/^([1-9][0-9]{3})\/(0[1-9]{1}|1[0-2]{1})\/(0[1-9]{1}|[1-2]{1}[0-9]{1}|3[0-1]{1})$/", $date)){
  echo $date . "正しい日付\n";
}else{
  echo $date . "不正な日付\n";
}
?>
