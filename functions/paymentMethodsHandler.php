<?php

function paymentMethodsHandler($text){
  if(!is_member()) return stop();
  
  $tombol = Bot::keyboard("[".implode("][", array_keys (paymentArray()))."]".getBackButton());
  
  $options = [
    'reply'=>true,
    'reply_markup'=>$tombol,
    'parse_mode'=>'html',
  ];
  return Bot::sendMessage("Please choose payment method:", $options);

}