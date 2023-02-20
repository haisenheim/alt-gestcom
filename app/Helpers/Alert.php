<?php
/**
 * Created by PhpStorm.
 * User: owner
 * Date: 07-Dec-19
 * Time: 11:31 PM
 */
namespace App\Helpers;

use App\Models\Alerte;
use App\Models\AlerteType;
use Illuminate\Support\Facades\Session;

class  Alert {
  public static function  refresh(){
    $alertes = Alerte::where('active',1)->where('filled_by',0)->get();
    $grps = $alertes->groupBy(function($alerte){
        return $alerte->type_id;
    });
    $data=[];
    $data['total'] = $alertes->count();
    foreach($grps as $k=>$v){
        $type = AlerteType::find($k);
        $data['categories'][]= ['name'=>$type->name,'color'=>$type->color,'count'=>$v->count()];
    }
    Session::put('alertes',$data);

  }

}
