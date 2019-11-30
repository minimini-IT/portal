<?php
$a = array_fill(0, 3, array_fill(0, 3, "test"));
$b = array_fill(0, 3, array_fill(0, 3, "sample"));
echo "---a---\n";
var_dump($a);
$e = each($a);
echo "---e---\n";
var_dump($e);
/*
foreach($a as $c, $b as $d){
  var_dump($c);
  var_dump($d);
}
 */
?>

