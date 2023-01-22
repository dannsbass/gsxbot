<?php
function getVipMembers(){
  $res =  'Empty';
  $vip_members = '';
  if(!empty(trim(db::get('vip_members')))){
    $user_ids = explode(" ", db::get('vip_members'));
    $user_ids = array_filter($user_ids);
    $jsons = explode("\n", db::get('update_json'));
    $jsons = array_filter($jsons);
    foreach($jsons as $json){
      $tg = json_decode($json, true);
      $fromid = $tg['from']['id'];
      $name = $tg['from']['first_name'];
      $name .= empty($tg['from']['last_name']) ? '' : ' ' . $tg['from']['last_name'];
      if(in_array($fromid, $user_ids)){
        $vip_members .= "👤 <a href='tg://user?id=$fromid'>$name</a> (<code>$fromid</code>)\n";
      }
    }
  }
  return $vip_members;

}