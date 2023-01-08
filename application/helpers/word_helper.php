<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function remove_word($sentence)
{
    $exp = explode(' ', $sentence);
    $removed_words = array_shift($exp);
    if(count($exp)>1){
        $w = implode(' ', $exp);
    }else{
        $w = $exp[0];
    }
    return $w;
}

function remove_word2($sentence)
{
    $exp = explode(' ', $sentence);
    $removed_words = array_shift($exp);
    if(count($exp)>2){
        $w = implode(' ', $exp);
    }else{
        $w = $exp[1];
    }
    return $w;
}


