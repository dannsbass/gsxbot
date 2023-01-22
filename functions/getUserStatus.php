<?php
function getUserStatus($from_id=''){
  $from_id = empty($from_id) ? fromid() : $from_id;
  if(is_admin()){
    $status = "Admin";
  }elseif(is_vip_member()){
    $status = "Vip member";
  }elseif(is_member()){
    $status = "User";
  }
  return $status;
}