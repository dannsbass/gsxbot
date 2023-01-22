<?php
function stop($from_id=''){
  
  if(empty($from_id)){
    
    $from_id = fromid();
  
  }
  
  $text = "❇️ WELCOME TO BOT CHECK GSX
👉 SEND ADMIN YOUR CHAT ID TO USE BOT
👉 YOUR CHAT ID IS : <code>$from_id</code>
👉 ADMIN : @UNLOCKSERVICE
👉 MY GROUP : @APPLE_PRO_GROUP
";
  
  $keyboard = getAdminInlineKeyboard();
  
  $options = ['reply_markup'=>$keyboard, 'reply'=>true, 'parse_mode'=>'html'];
  
  return Bot::sendMessage($text, $options);
}
