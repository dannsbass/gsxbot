<?php

function addAdminHandler($from_id)
  {
    if(!is_admin()) return;

    if(empty($from_id)){
      setStep('sendAdminIdToBeAdded');
      return Bot::sendMessage("Please send user chat ID to be added as admin",['reply'=>true,'parse_mode'=>'html','reply_markup'=>Bot::keyboard(getCancelString())]);
    }
    
    //$from_id = trim($cocok[2]);
    if(false !== strpos(db::get('admins'), (string)$from_id)){
      $pesan = "Chat ID $from_id already added as admin";
    }else{
      db::set('admins', db::get('admins') . " $from_id");
      $pesan = "Chat ID $from_id has been added as admin";
    }
    return Bot::sendMessage($pesan,['reply'=>true,'parse_mode'=>'html','reply_markup'=>Bot::keyboard(getBackButton())]);

  }