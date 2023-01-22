<?php

function removeAdminHandler($from_id)
  {
    if(!is_admin()) return false;

    if(empty($from_id)){
      setStep('sendAdminIdToBeRemoved');
      return Bot::sendMessage("Please send user chat ID to be removed from admin",['reply'=>true,'parse_mode'=>'html','reply_markup'=>Bot::keyboard(getCancelString())]);
    }
    
    //$from_id = trim($cocok[2]);
    if(false === strpos(db::get('admins'), (string)$from_id)){
      $pesan = "Chat ID $from_id not found or cannot be deleted";
    }else{
      $pesan = "Chat ID $from_id has been removed from admin";
      db::set('admins', str_replace($from_id, '', db::get('admins')));
    }
    return Bot::sendMessage($pesan,['reply'=>true,'parse_mode'=>'html','reply_markup'=>Bot::keyboard(getBackButton())]);
  }