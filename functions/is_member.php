<?php

function is_member($chat_id = ''){
  $userids = db::get('users');
  if(!empty($chat_id) and false === strpos($userids, (string)$chat_id) ) return false;
  if(false === strpos($userids, (string)fromid() )) return false;
  return true;
}