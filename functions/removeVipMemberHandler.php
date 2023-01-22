<?php
function removeVipMemberHandler($chat_id){
  if(!is_admin()) return;
  
  //jika chat id kosong
  if(empty($chat_id)) return Bot::sendMessage("Usage: /removevip [chat id]\n\nExample:\n\n<code>/removevip 9876543210</code>", ['parse_mode'=>'html', 'reply'=>true]);

  // jika ada spasi, pecah jadi array
  if(false !== strpos($chat_id, ' ')){
    $chat_id = explode(' ', $chat_id);
  }
  
  $vip_members = trim(db::get('vip_members'));

  $updated_vip_members = '';
  
  if(is_array($chat_id)){
    $message = '';
    foreach($chat_id as $id){
      if(false !== strpos($vip_members, (string)$id)){
        $message .= "Chat ID $id has been removed from VIP members\n";
        $updated_vip_members = str_replace((string)$id, '', $vip_members);
      }else{
        $message .= "$id is not VIP member\n";
      }
    }
  }else{
    if(false !== strpos($vip_members, (string)$chat_id)){
      $updated_vip_members = str_replace((string)$chat_id, '', $vip_members);
      $message = "Chat ID $chat_id has been removed from VIP members";
    }else{
      $updated_vip_members = $vip_members;
      $message = "$chat_id is not VIP member";
    }
  }

  db::set('vip_members', $updated_vip_members);
  
  return Bot::sendMessage($message, ['reply'=>true, 'parse_mode'=>'html']);
  
  // return Bot::sendMessage(db::get('vip_members'));
}