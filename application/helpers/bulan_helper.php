<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function convertBulan($bln){
    if($bln == 1){
        $b = "Januari";
    }elseif($bln == 2){
        $b = "Pebruari";
    }elseif($bln == 3){
        $b = "Maret";
    }elseif($bln == 4){
        $b = "April";
    }elseif($bln == 5){
        $b = "Mei";
    }elseif($bln == 6){
        $b = "Juni";
    }elseif($bln == 7){
        $b = "Juli";
    }elseif($bln == 8){
        $b = "Agustus";
    }elseif($bln == 9){
        $b = "September";
    }elseif($bln == 10){
        $b = "Oktober";
    }elseif($bln == 11){    
        $b = "November";
    }elseif($bln == 12){
        $b = "Desember";
    }else{
        $b = "unknown";
    }
    return $b;
}


