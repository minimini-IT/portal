<?php
$a = array("201911301200","201912011730","201912031900","201911301830","201912021200");
//if(array_search("201911301200", $a)){
//if(array_search("201911301200", $a)){
if(in_array("201911301200", $a)){
  echo "true\n";
}else{
  echo "false\n";
}
/*
$array = ["11/11", "11/12", "11/13", "11/14"];
//echo in_array("11/14", $array);
//echo array_search("11/13", $array);
if(array_search("11/13", $array)){
  echo "true\n";
}else{
  echo "false\n";
}
 */
/*
echo "\n";
var_dump(array_search("11/13", $array));
echo "\n";
 */
?>
