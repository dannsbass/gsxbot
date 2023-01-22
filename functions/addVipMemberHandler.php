<?php
function addVipMemberHandler($chat_id){
  if(!is_admin()) return;
  if(empty($chat_id)) return Bot::sendMessage("Usage: /addvip [chat id]\n\nExample:\n\n<code>/addvip 9876543210</code>", ['parse_mode'=>'html', 'reply'=>true]);

  if(false !== strpos($chat_id, ' ')){
    $chat_id = explode(' ', $chat_id);
  }
  $vip_members = trim(db::get('vip_members'));
  if(is_array($chat_id)){
    $ids = '';
    foreach($chat_id as $id){
      if(false !== strpos($vip_members, (string)$id)) continue;
      $ids .= $id.' ';      
    }
    $chat_id = $ids;
  }
  if(false !== strpos($vip_members, (string)$chat_id)) return Bot::sendMessage("Chat ID $chat_id is already VIP member.");
  db::set('vip_members', "$vip_members $chat_id");
  Bot::sendMessage("Success. Chat ID <b>$chat_id</b> has been added as VIP member.", ['reply'=>true, 'parse_mode'=>'html']);
  return Bot::sendMessage(db::get('vip_members'));
}