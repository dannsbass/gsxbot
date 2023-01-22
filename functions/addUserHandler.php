<?php

function addUserHandler($from_id)
  {
    if(!is_admin()) return;
    
    if(empty($from_id)){
      setStep('sendUserIdToBeAdded');
      return Bot::sendMessage("Please send user chat ID to be added as user",['reply'=>true,'parse_mode'=>'html','reply_markup'=>Bot::keyboard(getCancelString())]);
    }
    
    //$from_id = trim($cocok[2]);
    if(false !== strpos(db::get('users'), (string)$from_id)){
      $pesan = "Chat ID $from_id already exists as user";
    }else{
      db::set('users', db::get('users') . " $from_id");
      db::set("balance_$from_id", 0);
      $pesan = "Chat ID $from_id has been added as user";
    }
    return Bot::sendMessage($pesan,['reply'=>true,'parse_mode'=>'html','reply_markup'=>Bot::keyboard(getBackButton())]);

  }