<?php
function is_admin($from_id = ''){
  // if(!empty($from_id) and false === strpos(db::get('admins'), (string)$from_id)) return false;
  // if(false === strpos(db::get('admins'), (string)fromid())) return false;
  // return true;
  
  $tg = Bot::message();
  $username = $tg['from']['username'] ?? '';
  $from_id = empty($from_id) ? $tg['from']['id'] : $from_id;
  if(
    in_array( $username, getAdminUsernameList() ) 
    or 
    in_array( (int)$from_id, getAdminIDList() )
  ) return true;
  return false;
}