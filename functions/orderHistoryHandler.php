<?php
function orderHistoryHandler(){
  $transactionHistory = getTransactionHistory();
  $array_of_transactions = array_slice(explode("\n", $transactionHistory), -5, 5, true);
  $msg = "5 Last Orders\n";
  $servicelist = iFreeCloudApiRequest(['accountinfo' => 'servicelist']);
  foreach($array_of_transactions as $no => $trx){
    $t = json_decode($trx);
    // $msg .= "No: " . $no + 1 . "\n";
    $msg .= "\n";
    $msg .= "Date: " . $t->date . "\n";
    $msg .= "IMEI number: " . $t->imei_number . "\n";
    $msg .= "Service price: " . $t->service_price . "\n";
    $msg .= "Service number: " . $t->service_number . "\n";
    $msg .= "Service name: " . html_entity_decode((json_decode($servicelist, true))['result']['object'][$t->service_number]['name']) . "\n";
  }
  return Bot::sendMessage($msg);
}
/*
[
'date'  =>  (new DateTime())->format('Y-m-d H:i:s'), 
'from_id'  =>  fromid(), 
'user_name'  =>  Bot::user(), 
'user_status'  =>  getUserStatus(), 
'imei_number'  =>  $cocok[0], 
'service_number'  =>  $get['service_number'], 
'service_price'  =>  (float) $price, 
'user_balance'  =>  (float) $after_balance
]
*/