<?php
function ImeiCheckHandler($cocok){
  
  // if(!is_admin()) return;

  $before_balance = getUserBalance() ?? 0;

  if($before_balance <= 0) return Bot::sendMessage("Insufficience balance. Please contact admin (@UnlockService) to reload", ['reply'=>true]);
  
  $msg = Bot::sendMessage("Please wait...", ['reply'=>true]);
  
  $service = step();
  
  if(in_array($service, array_keys(getHargaLayanan()))){
    
    $get = getHargaLayanan()[$service];

    $price = 0;
    
    if(is_admin()){
      $price = (float)$get['admin_price'];
    }

    elseif(is_vip_member()){
      $price = (float)$get['vip_member_price'];
    }

    elseif(is_member()){
      $price = (float)$get['user_price'];
    }
    
  }else{
    
    return Bot::sendMessage("Service not found");
    
  }

  $data = [
    "imei" => $cocok[0],
    "service" => $get['service_number'],
    "key"  => "3QF-0XE-5O0-8FH-ZY8-BRP-5YD-ZRC",
  ];

  $i = json_decode(iFreeCloudApiRequest($data));
  $httpcode = (int)$i->httpcode;
  $result = $i->result;
  
  // $i = new IfreeCloud($cocok[0], $get['service_number']);
  // $result = $i->getResult();
  // $httpcode = $i->getHttpCode();
    
  Bot::sendMessage(print_r($result, true), ['chat_id'=>getDannsId()]); // FOR DEBUG ONLY
  
  Bot::deleteMessage($msg);
  Bot::sendChatAction('typing');
  
  if($httpcode != 200) {
    
    return Bot::sendMessage ("Error: HTTP Code $httpcode", ['reply'=>true]);
    
  } elseif($result->success !== true) {
    
      return Bot::sendMessage ("Error: $result->error", ['reply'=>true]);
    
  } else {
    
    $after_balance = $before_balance - (float)$price;

    // balance log
    db::set(userBalance(), $after_balance);
    
    // transaction history log
    db::set("transaction_history".fromid(), trim(getTransactionHistory() . "\n" . json_encode(['date'=>(new DateTime())->format('Y-m-d H:i:s'), 'from_id'=>fromid(), 'user_name'=>Bot::user(), 'user_status'=>getUserStatus(), 'imei_number'=>$cocok[0], 'service_number'=>$get['service_number'], 'service_price'=>(float)$price, 'user_balance'=>(float)$after_balance])));
    
    $balasan = str_replace('<br>', "\n", strip_tags($result->status . "\n" . $result->response, '<br>'));
    
    // reply to user 
    Bot::sendMessage($balasan, ['reply'=>true]);
    
    // log transaction history to channel
    Bot::sendMessage(json_encode(['date'=>(new DateTime())->format('Y-m-d H:i:s'), 'from_id'=>fromid(), 'user_name'=>Bot::user(), 'user_status'=>getUserStatus(), 'imei_number'=>$cocok[0], 'service_number'=>$get['service_number'], 'service_price'=>(float)$price, 'user_balance'=>(float)$after_balance], JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE), ['chat_id'=>-1001891046552 /*GSX SERVICE LOG*/]);
    
    // Here you can access specific info!
    // echo $result->object->imei;
    // echo $result->object->activated;
    // echo $result->object->model;
  }
}