<?php
function addUserBalanceHandler($chat_id, $price){
  if(!is_admin()) return;
  
  $admin_balance = getUserBalance();
  
  if(empty($chat_id)) return Bot::sendMessage("❌Failed. User chat ID and price are empty. Put the user chat ID dan the price (number only). Example: <code>/addpriceuser 987654321 10</code>", ['reply'=>true, 'parse_mode'=>'html']);
  
  if(!is_member($chat_id)) return Bot::sendMessage("❌Failed. Chat ID not found. Check /users chat ID.", ['reply'=>true]);
  
  if(empty($price)) return Bot::sendMessage("❌Failed. Price empty. Put the price (number only).", ['reply'=>true]);
  
  if(!is_numeric($price)) return Bot::sendMessage("❌Failed. Price must be number only, ie: 1 or 0.01", ['reply'=>true]);

  if((float)$admin_balance < (float)$price) return Bot::sendMessage("❌Failed. Unsufficient balance. Your balance now: $admin_balance\$");

  db::set('admin_balance', ((float)db::get('admin_balance') ?? 0) + (float)$price);
  $before_balance = (float)db::get("balance_$chat_id") ?? 0;
  $after_balance = $before_balance + (float)$price;
  db::set("balance_$chat_id", $after_balance);
  $res = "👤User chat ID: <a href='tg://user?id=$chat_id'>$chat_id</a>\n";
  $res .= "💲Before: $before_balance\n";
  $res .= "💲New price: $price\n";
  $res .= "💰After: $after_balance\n";
  Bot::sendMessage("Admin has added <b>$price\$</b> to your balance ($before_balance\$). Your total balance now is: <b>$after_balance\$</b>", ['parse_mode'=>'html', 'chat_id'=>$chat_id]);
  return Bot::sendMessage("<b>✅Success! Price has been added</b>\n\n$res", ['parse_mode'=>'html', 'reply'=>true]);
  
}
