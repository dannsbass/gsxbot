<?php
function createSubBottonArray(){
  $array_tombol = json_decode(db::get('button_json'), true);
  foreach($array_tombol as $menu => $submenu){
    foreach(explode("\n", $submenu) as $pecahan){
      $pecahan = preg_replace('/\(([^\)]+)?\$([^\)]+)?\)/', '', $pecahan);
      $array[trim($pecahan)] = $menu;
    }    
  }
  return $array;
}
/*
if(in_array($text, array_keys(createSubBottonArray(getButtonArray()[$text])))){
  return Bot::sendMessage(createSubBottonArray(getButtonArray()[$text])[$text]);
}
*/
