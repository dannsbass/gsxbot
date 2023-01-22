<?php

function removeUserHandler($from_id)
  {
    if(!is_admin()) return;

    if(empty($from_id)){
      setStep('sendUserIdToBeRemoved');
      return Bot::sendMessage("Please send user chat ID to be removed",['reply'=>true,'parse_mode'=>'html','reply_markup'=>Bot::keyboard(getCancelString())]);
    }
    
    //$from_id = trim($cocok[2]);
    if(false === strpos(db::get('users'), (string)$from_id)){
      $pesan = "Chat ID $from_id not exist as user";
    }else{
      db::set('users', str_replace($from_id, '', db::get('users')));
      $pesan = "Chat ID $from_id has been removed from users";
    }
    return Bot::sendMessage($pesan,['reply'=>true,'parse_mode'=>'html','reply_markup'=>Bot::keyboard(getBackButton())]);  

  }