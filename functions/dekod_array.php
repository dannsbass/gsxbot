<?php
function dekod_array(array $array):array {
    $new = [];
    foreach($array as $key => $value){
        if(is_array($value)){
            $value = ($value);
        }
        $key = str_replace(base64_encode('['), '[',  $key);
        $key = str_replace(base64_encode(']'), ']', $key);
        $value = str_replace(base64_encode('['), '[', $value);
        $value = str_replace(base64_encode(']'), ']', $value);
        $new[$key] = $value;
    }
    return $new;
}