<?php

function getUserIDsHandler($text){
  if(!is_member()) return;
  
  $res = Bot::sendMessage("Please wait...", ['parse_mode'=>'html', 'reply'=>true]);
  
  Bot::sendChatAction('typing');
  
  Bot::sendMessage( "š“ <b>ADMINS:</b>\n".getAdminIDs(), ['parse_mode'=>'html', 'reply'=>true]);
  
  Bot::sendChatAction('typing');
  
  Bot::sendMessage("š¢ <b>VIP MEMBERS:</b>\n".getVipMembers(), ['parse_mode'=>'html', 'reply'=>true]);
  
  Bot::sendChatAction('typing');
  
  Bot::sendMessage("\nšµ <b>USERS:</b>\n".getUserIDs(), ['parse_mode'=>'html', 'reply'=>true]);
  
  Bot::sendChatAction('typing');
  
  Bot::sendMessage("\nš” <b>GUESTS:</b>\n".getGuestIDs(), ['parse_mode'=>'html', 'reply'=>true]);
  
  return Bot::deleteMessage($res);
}