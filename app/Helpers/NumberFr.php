<?php
/**
 * Created by PhpStorm.
 * User: owner
 * Date: 07-Dec-19
 * Time: 11:31 PM
 */
namespace App\Helpers;



class  NumberFr {

  public static function  format($value,$decimal=0){
		return number_format($value,$decimal,',','.');
  }

}
