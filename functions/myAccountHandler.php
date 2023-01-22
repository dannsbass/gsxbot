<?php

function myAccountHandler(){
  if(!is_member()) return;
  $fromid = fromid();
  $name = username();
  $balance = trim(getUserBalance()) ?? '0';
  $status = getUserStatus();
  $res = "👤 Name: <a href='tg://user?id=$fromid'>$name</a>\n";
  $res .= "🆔 Chat ID: <code>$fromid</code> ".(($status == 'Admin') ? "(see: /users)" : "")."\n";
  $res .= "🏆 Status: $status  ".(($status == 'Admin') ? "(see: /admins)" : "")."\n";
  $res .= "💲 Balance: $balance\$ ".(($status == 'Admin') ? "(/addpriceuser)" : "\n(Contact admin @UnlockService to add balance)")."\n";
  return Bot::sendMessage($res, ['reply'=>true, 'parse_mode'=>'html', 'reply_markup'=>Bot::keyboard(getBackButton())]);
}