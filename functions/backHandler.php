<?php

function backHandler($text = ''){
  if(!is_member()) return stop();
  
  $keyboard = Bot::keyboard(createButton());
  
  $text = "❇️Please select menu button:";
  
  return Bot::sendMessage($text, ['reply_markup'=>$keyboard, 'parse_mode'=>'html']);
}