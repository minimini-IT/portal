<?php
/*
preg_match("/(foo)(bar)(baz)/", "foobarbaz", $matches, PREG_OFFSET_CAPTURE);
print_r($matches);
echo "\n";
 */
$check = "0009999888";
// /〜〜〜/　一つの単語
//  ^◯　頭に◯が来る
//  \d　[0-9]の略（0から9のどれか）
//  ◯{9,10}　◯を9回から10回繰り返す
//  ◯$　末に◯が来る
$a = (bool)preg_match("/^0\d{9,10}$/", str_replace("", "", $check), $b);
print_r($a);
echo "\n";
print_r($b);
echo "\n";

