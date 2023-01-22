<?php
function getUserBalance($from_id=''){
  if(is_admin()){
    $result = json_decode(iFreeCloudApiRequest(['accountinfo' => 'balance']));
    return (float)$result->result->object->available_balance - (float)db::get('admin_balance'); // see: addUserBalanceHandler()
  }
  $from_id = empty($from_id) ? fromid() : $from_id;
  return (float)db::get(userBalance($from_id));
}