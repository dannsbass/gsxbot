<?php
function sendBroadcastInfoHandler(){
  if(!is_admin()) return;
  // $message = "<b>Command:</b>\n/sendbroadcast [message] - to send broadcast messages to all visitors of this bot.\n\nExampe:\n\n<code>/sendbroadcast Hello, this is a broadcast message.</code>";
  $message = "Please send message to broadcast:";
  setStep('sendBroadcastMessageToAllUsers');
  return Bot::sendMessage($message, ['parse_mode'=>'html', 'reply'=>true, 'reply_markup'=>Bot::keyboard(getCancelString())]);
}