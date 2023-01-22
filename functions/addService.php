<?php
function addService($category, $service, $user_price, $vip_member_price){
  $service_array = [
    $service => [
    'user_price' => $user_price,
    'vip_member_price' => $vip_member_price
    ]
  ];
  $button_array = getButtonArray();
  $button_array[$category] = $service_array;
  db::set('button_json', json_encode($button_array));
}