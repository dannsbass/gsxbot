<?php

function addPriceUserHandler(){
  if(!is_admin) return;
  $text = "Command list:\n/addpriceuser [user chat id] [price] - to add price.\n/userprice [chat id] - to see user's balance.\n/users - to see user chat IDs.\n\nExample:\n\n<code>/addpriceuser 987654321 10</code>\n(It means you add <b>$10</b> to user whose chat ID is <b>987654321</b>).";
  $options = [
    'reply'=>true,
    'parse_mode'=>'html',
    'reply_markup'=>Bot::keyboard(getCancelString()),
  ];
  return Bot::sendMessage($text, $options);
  // $keyboard = '';
  // $uids_arr = array_filter(explode(' ', db::get('users')));
  // $update_arr = array_filter(explode("\n", db::get('update_json')));
  // foreach($update_arr as $update){
  //   $tg = json_decode($update, true);
  //   $fromid = $tg['from']['id'];
  //   $name = $tg['from']['first_name'];
  //   $name .= empty($tg['from']['last_name']) ? '' : ' ' . $tg['from']['last_name'];
  //   if(in_array($fromid, $uids_arr)){
  //     $keyboard .= "[👤$name|add_price_user$fromid]\n";
  //   }
  // }
  // $markup = Bot::inline_keyboard($keyboard);
  // return Bot::sendMessage("Please choose user:", ['reply'=>true, 'reply_markup'=>$markup]);
}