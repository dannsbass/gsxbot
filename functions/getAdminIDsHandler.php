<?php
function getAdminIDsHandler($text){
  if(!is_admin()) return false;
  $res = Bot::sendMessage("Please wait...", ['parse_mode'=>'html', 'reply'=>true]);
  Bot::sendChatAction('typing');
  $adminIDs = getAdminIDs();
  Bot::deleteMessage($res);
  return Bot::sendMessage($adminIDs, ['parse_mode'=>'html', 'reply'=>true]);
}