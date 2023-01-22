<?php
function iFreeCloudApiRequest($data){
  $data['key'] = "3QF-0XE-5O0-8FH-ZY8-BRP-5YD-ZRC";
  $ch = curl_init();
  curl_setopt_array($ch, [
    CURLOPT_URL => "https://api.ifreeicloud.co.uk",
    CURLOPT_POSTFIELDS => $data,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_CONNECTTIMEOUT => 60,
    CURLOPT_TIMEOUT => 60,
  ]);
  $result = curl_exec($ch);
  $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);
  return json_encode([
    'httpcode' => $httpcode, 
    'result' => json_decode($result),
    ]);
}