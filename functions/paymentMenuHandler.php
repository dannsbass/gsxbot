<?php

function paymentMenuHandler($text){
  if(!is_member()) return stop();
  
  $hasil = paymentArray()[$text];
  $tombol = Bot::keyboard("[".implode("][", array_keys (paymentArray()))."]".getBackButton());
  $options = [
    'reply'=>true,
    'reply_markup'=>$tombol,
    'parse_mode'=>'html',
  ];
  return Bot::sendMessage($hasil, $options);

}