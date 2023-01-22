<?php

function is_editor(){
  $fromid = Bot::message()['from']['id'];
  if(!empty(trim(db::keys('editor_is'.$fromid)))){
    if(db::get('editor_is'.$fromid) == 'yes') return true;
    return false;
  }
  return false;
}