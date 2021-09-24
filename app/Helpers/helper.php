<?php
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



function check_diff_multi($array1, $array2){
    $result = array();
    foreach($array1 as $key => $val) {
         if(isset($array2[$key])){
           if(is_array($val) && $array2[$key]){
               $result[$key] = check_diff_multi($val, $array2[$key]);
           }
       } else {
           $result[$key] = $val;
       }
    }

    return $result;
}

function implodeArrayofArrays($array, $glue  = ', ') {
    $output = '';
    foreach ($array as $subarray) {
        $output .= implode($separator, $subarray);
    }
    return $output;
}