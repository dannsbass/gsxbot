<?php

function addRemoveAdminHandler($text){
  
  $text = "/addadmin [admin chat id] - to add admin\n";
  $text .= "/removeadmin [admin chat id] - to remove admin\n";
  $text .= "/admins - to see admin list\n";
  $text .= "\nExample:\n";
  $text .= "\n<code>/addadmin 9876543210</code>";
  
  return Bot::sendMessage($text, ['parse_mode'=>'html']);
}