<?php
$a = "1/1</br>(火)";
$length = strpos($a, "</br>") - 0;
echo "--length-- ->";
echo $length;
echo "\n";
print substr($a, 0, $length);
echo "\n";
/*

$target_text = "この文章からdelimココ区切りを抽出します";
$delimiter_start = "delim";
$delimiter_end = "区切り";
$start_position = strpos($target_text, $delimiter_start) + strlen($delimiter_start);
echo "--start_position-- -> ";
echo $start_position;
echo "\n";
$length = strpos($target_text, $delimiter_end) - $start_position;
echo "--length-- -> ";
echo $length;
echo "\n";
print substr($target_text, $start_position, $length);
echo "\n";
 */
?>
