<?php
function is_vip_member($chat_id = ''){
  if(!empty($chat_id) and false === strpos(db::get('vip_members'), (string)$chat_id)) return false;
  if(false === strpos(db::get('vip_members'), (string)fromid())) return false;
  return true;
}