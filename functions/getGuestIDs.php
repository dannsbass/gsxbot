<?php

function getGuestIDs(){
  $res =  'Empty';
  $guests = '';
  if(!empty(trim(db::get('guests')))){
    $jsons = explode("\n", db::get('update_json'));
    $jsons = array_filter($jsons);
    foreach($jsons as $json){
      $tg = json_decode($json, true);
      $fromid = $tg['from']['id'];
      $name = $tg['from']['first_name'];
      $name .= empty($tg['from']['last_name']) ? '' : ' ' . $tg['from']['last_name'];
      $guests .= "👥 <a href='tg://user?id=$fromid'>$name</a> (<code>$fromid</code>)\n";
    }
  }
  return $guests;
}