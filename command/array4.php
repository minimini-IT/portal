<?php
$a = array(
  "test" => "testa",
  "sample" => "samplea",
  "example" =>"examplea"
);
var_dump($a);
//var_dump(array_keys($a, "samplea"));
$b = $a["sample"];
$c = array(
  "asdf" => $b
);
//var_dump(array_search($b, $a));
//var_dump(array_keys($a, $b));
/*
$b = array(
  array_keys($a, $b) => $b
);
 */
var_dump($c);
