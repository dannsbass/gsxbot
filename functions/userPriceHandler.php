<?php
function userPriceHandler($chat_id){
  if(!is_admin()) return;
  if(empty(trim(db::keys("balance_$chat_id")))) return Bot::sendMessage("Data not found. Please check user chat ID or add price first with <code>/addpriceuser $chat_id [price]</code> command.", ['reply'=>true, 'parse_mode'=>'html']);
  $balance = db::get("balance_$chat_id") ?? 0;
  return Bot::sendMessage("👤User chat ID: <b><a href='tg://user?id=$chat_id'>$chat_id</a></b>\n💰Balance: <b>$balance\$</b>", ['reply'=>true, 'parse_mode'=>'html']);
}