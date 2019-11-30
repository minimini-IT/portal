<?php

namespace App\Model\Validation;

use Cake\Validation\Validation;

class CustomValidation extends Validation{
  //電話番号をチェック
  public static function isPhone($check, $options){
    //return (bool)preg_match("/^0\d{9,10}$/", str_replace("-", "", $check));
    return (bool)preg_match("/^0\d{9,10}$/", str_replace("", "", $check));
  }
}
