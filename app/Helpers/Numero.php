<?php
/**
 * Created by PhpStorm.
 * User: owner
 * Date: 07-Dec-19
 * Time: 11:31 PM
 */
namespace App\Helpers;

use App\Models\Parametre;

class  Numero {

  public static function  facture(){
		$parametre = Parametre::find(1);

	    $nfc= $parametre->num_facture;
	    if($parametre->annee != date('Y')){
		    $nfc =1;
		    $parametre->num_facture=1;
		    $parametre->annee = date('Y');
		    $parametre->save();
	    }else{
		    $nfc = $parametre->num_facture + 1;
		    $parametre->num_facture = $parametre->num_facture + 1;
		    $parametre->save();
	    }

	  return $nfc;

	}
} 