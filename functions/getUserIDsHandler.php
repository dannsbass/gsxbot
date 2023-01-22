<?php

function getUserIDsHandler($text){
  if(!is_member()) return;
  
  $res = Bot::sendMessage("Please wait...", ['parse_mode'=>'html', 'reply'=>true]);
  
  Bot::sendChatAction('typing');
  
  Bot::sendMessage( "🔴 <b>ADMINS:</b>\n".getAdminIDs(), ['parse_mode'=>'html', 'reply'=>true]);
  
  Bot::sendChatAction('typing');
  
  Bot::sendMessage("🟢 <b>VIP MEMBERS:</b>\n".getVipMembers(), ['parse_mode'=>'html', 'reply'=>true]);
  
  Bot::sendChatAction('typing');
  
  Bot::sendMessage("\n🔵 <b>USERS:</b>\n".getUserIDs(), ['parse_mode'=>'html', 'reply'=>true]);
  
  Bot::sendChatAction('typing');
  
  Bot::sendMessage("\n🟡 <b>GUESTS:</b>\n".getGuestIDs(), ['parse_mode'=>'html', 'reply'=>true]);
  
  return Bot::deleteMessage($res);
}