<?php
function sendBroadcastHandler($cocok){
  
  if(!is_admin()) return;
  
  Bot::sendMessage($cocok[1], ['chat_id'=>-1001589154009]); // apple_pro channel
  
  foreach (array_filter(explode(" ", db::get('guests'))) as $id){
    Bot::sendMessage($cocok[1], ['chat_id'=>$id, 'parse_mode'=>'html']);
  }
}