<?php

function is_ok($from_id = ''){
  if(empty($from_id)){
    $from_id = fromid();
  }
  if(
    false === strpos(db::get('users'), (string) $from_id) 
    and 
    !is_admin()
  ) return false;
  return true;
}
