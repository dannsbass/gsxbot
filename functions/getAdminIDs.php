<?php

function getAdminIDs(){
  $res =  'Empty';
  $admins = '';
  if(!empty(trim(db::get('admins')))){
    $jsons = explode("\n", db::get('update_json'));
    $jsons = array_filter($jsons);
    foreach($jsons as $json){
      $tg = json_decode($json, true);
      $fromid = $tg['from']['id'];
      $name = $tg['from']['first_name'];
      $name .= empty($tg['from']['last_name']) ? '' : ' ' . $tg['from']['last_name'];
      if(in_array($fromid, getAdminIDList())){
        $admins .= "👮🏻‍♂️ <a href='tg://user?id=$fromid'>$name</a> (<code>$fromid</code>)\n";
      }
    }
    $admins;
  }
  return $admins;
}