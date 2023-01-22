<?php

function is_ready_to_change_price(){
  $fromid = Bot::message()['from']['id'];
  if(!empty(trim(db::keys('change_price'.$fromid)))) {
    if(db::get('change_price'.$fromid) == 'on') return true;
    return false;
  }
  return false;
}