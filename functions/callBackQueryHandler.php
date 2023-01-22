<?php
function callBackQueryHandler($data){
  $text = "Put the amount you want to add to the user:\n\n$user\n\n(Note: number only, for example: 10 or 0.1)";
  db::set($data, 'waiting');
  $tg = Bot::message();
  $emrmid = $tg['message']['message_id'];
  $opts = [
    'text'=>$text,
    'chat_id'=>$tg['chat']['id'],
    'message_id'=>$tg['message']['message_id'],
    // 'reply'=>true, 
    // 'parse_mode'=>'html', 
    'reply_markup'=>Bot::inline_keyboard(getCancelString()),
    ];
  // $result = Bot::editMessageText($opts);
  return Bot::sendMessage(json_encode($tg));
}