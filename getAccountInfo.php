<?php
foreach(glob("functions/*.php") as $file) require $file;

function sendMessage($text){
  $ch = curl_init("https://api.telegram.org/bot1981029592:AAHsaHRpgrFsRKy336eaWgj5_yojeFIUnVY/sendMessage");
  curl_setopt_array($ch, [
    CURLOPT_POSTFIELDS => [
      'text' => $text,
      'chat_id' => 
                    //1231968913,
                    976057532,
    ],
  ]);
  curl_exec($ch);
  curl_close($ch);
}

$account_info = "balance";
$account_info = "servicelist";

if(isset($argv[1])){
  $account_info = $argv[1];
}

$array = getAccountInfo($account_info);
print_r($array);

die;

foreach($array as $text){
  $text = str_replace(['Array', '(', ')'], '', print_r($text, true));
  // sendMessage($text);
}


$services = [];
foreach($array as $key => $value){
    $services[$value['name']] = [
      'no' => $value['service'],
      'price' => $value['price'],
      'time' => $value['time'],
      'description' => $value['description'],
      'snSupport' => $value['snSupport'],
    ];
}

//db::set('services_list', json_encode($services));

echo createStringfromArrayforMainMenuButton(json_decode(db::get('services_list'), true));

function getAccountInfo($account_info):array
{
  $myCheck["accountinfo"] = $account_info;
  $myCheck["key"] = '3QF-0XE-5O0-8FH-ZY8-BRP-5YD-ZRC';
  $ch = curl_init("https://api.ifreeicloud.co.uk");
  curl_setopt($ch, CURLOPT_POSTFIELDS, $myCheck);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
  curl_setopt($ch, CURLOPT_TIMEOUT, 60);
  $myResult = json_decode(curl_exec($ch), true);
  $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);
  if($httpcode != 200) {
    return false;
      // echo "Error: HTTP Code $httpcode";
  } elseif($myResult['success'] !== true) {
    return false;
      // echo "Error: ". $myResult['error'];
  } else {
      // header('Content-type: text/plain');
      // echo $myResult->response; // For Beginners (HTML Table)
      // echo "<hr><pre>";
      return $myResult['object'];
      // echo "</pre><hr>"; // For Pros (JSON Object)
      // Beginner's table only shows ID, Name, Price & Description
      // Pro's JSON also shows Processing Time & Serial Support
  }
}

die;


function request(){
  $data = checkAccountInfo();
  define('DATA', $data);
  // if(!$data) return Bot::sendMessage('Server error');
  $i = 1;
  $tombol = '';
  $daftar_layanan = [];
  foreach($data as $nomor => $array){
    if($i%2 == 0){
      $tombol .= "\n";
    }
    $i++;
    foreach($array as $key => $value){
      if($key == 'name'){
        $value = '❇️'.trim(preg_replace('/\&\#\d+\;|\(Emergency\)|iFreeCheck /','',$value));
        $daftar_layanan[$value] = $nomor;
        $tombol .= "[$value]";
      }
    }
  }
  // echo "<pre>";
  // print_r($daftar_layanan);
  // echo "</pre>";
  
  $tombol .= "\n[PAYMENT]";
  
  define('TOMBOL', $tombol);
  define('DAFTAR_LAYANAN', $daftar_layanan);
  
  $payment = "⚡️⚡️ PAYMENT ⚡️⚡️
  ❇️ USDT ( TRC20 ONLY ): 
  👉 ADDRESS :  ( REMITANO )
  TWoqP398c9h8VgtphMVbJSh3BWbXaGZ52n
  
  👉 ADDRESS : ( BINANCE )
  TAqSX9y8ZwgFLEMSfzPbKiGmsnCFvRW1GL
  
  TRON ( TRC20 ) ONLY 
  
  ❇️ SKRILL : 
  👉 ADDRESS : 
  hoangmobile1981@gmail.com
  
  ❇️ VIET NAM THANH TOÁN : 
  
  ❇️ MBBANK : 
  👉Tên : NGUYEN TAN HOANG 
  👉 STK : 0844434777
  
  ❇️ VCB : 
  👉 Tên : NGUYEN TAN HOANG 
  👉 STK : 9943908181
  👉 STK : 0121000732322";
  
  define('PAYMENT', $payment);
}




