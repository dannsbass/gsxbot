<?php
function getJawabanHarga($array_harga){
  //if(!is_admin()) return false;
  
  $text = "💰 Price: ".$array_harga['user_price']."\$\n";
  
  if( is_admin() ){
    $text = "💰 User price: ".$array_harga['user_price']."\$\n";
    $text .= "💳 VIP member price: ".$array_harga['vip_member_price']."\$\n";
    $admin_price = isset($array_harga['admin_price']) ? $array_harga['admin_price'] ."\$" : "(not available)";
    $text .= "💵 Admin price: ".$admin_price."\n";
  }
  
  elseif( is_vip_member() ){
    $text = "<s>💰 Price: ".$array_harga['user_price']."\$</s>\n";
    $text .= "💳 Your price: ".$array_harga['vip_member_price']."\$\n";
  }
  
  if(isset($array_harga['service_number'])){
    $text .= "⏰ Time: Instant\n";
    $text .= "✔️ Submit IMEI/SN:";
  }
  return $text;
}