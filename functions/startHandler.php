<?php

function startHandler(){
  $guests = db::get('guests');
  $tg = Bot::message();
  $from_id = $tg['from']['id'];

  // jika user baru pertama kali mengirim ke bot
  if(false === strpos($guests, (string)$from_id)){
    db::set('guests', "$guests $from_id");
    db::set('update_json', db::get('update_json') . "\n" . json_encode($tg) );
  }
  
  if(!is_ok()) return stop();
  
  $first_name = $tg['from']['first_name'];
  $user = "<a href='tg://user?id=$from_id'>$first_name</a>";

  $keyboard = Bot::keyboard(createButton());
  
  $text = "$user

❇️ WELCOME TO BOT CHECK GSX
👉 MY GROUP : @APPLE_PRO_GROUP
👉 ADMIN : @UNLOCKSERVICE

Please select menu button:";
  
  return Bot::sendMessage($text, ['reply_markup'=>$keyboard, 'parse_mode'=>'html', 'reply'=>true]);
}