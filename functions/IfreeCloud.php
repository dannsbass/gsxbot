<?php
class IfreeCloud
{
  public $imei;
  public $result;
  public $httpcode;
  public $service_number;
  
  public function __construct($imei, $service_number){
    $this->imei = $imei;
    $this->service_number = $service_number;
    $get = $this->APIRequest();
    $this->result = $get['result'];
    $this->httpcode = $get['httpcode'];
  }

  public function getResult(){
    return $this->result;
  }

  public function getHttpCode(){
    return $this->httpcode;
  }
  
  public function APIRequest(){
    $data = [
      "imei" => $this->imei,
      "service" => $this->service_number,
      "key"  => "3QF-0XE-5O0-8FH-ZY8-BRP-5YD-ZRC",
    ];
    $ch = curl_init("https://api.ifreeicloud.co.uk");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    $result = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return [
      'httpcode' => $httpcode, 
      'result' => json_decode($result),
      ];
  }
}