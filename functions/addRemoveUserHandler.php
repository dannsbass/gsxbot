<?php

function addRemoveUserHandler($text){

  $list_of_admins = db::get('admins');
  
  $text = "<b>List of commands:</b>\n\n";
  $text .= "/adduser [user chat id] - to add user\n";
  $text .= "/removeuser [user chat id] - to remove user\n";
  $text .= "/addvip [member chat id] - to add VIP member\n";
  $text .= "/removevip [member chat id] - to remove VIP member\n";
  $text .= "/users - to see user list\n";
  $text .= "\nExample:\n";
  $text .= "\n<code>/adduser 9876543210</code>";
  
  return Bot::sendMessage($text, ['parse_mode'=>'html', 'reply'=>true]);
}