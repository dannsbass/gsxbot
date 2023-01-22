<?php
foreach(glob(__DIR__.'/functions/*.php') as $function) require $function;

echo print_r((json_decode(iFreeCloudApiRequest(['accountinfo' => 'servicelist']), true))['result']['object'], true);

exit;

$result = json_decode(iFreeCloudApiRequest(['accountinfo' => 'balance']));
   echo (float)$result->result->object->available_balance;
exit;

//var_dump($result); exit;

$a = false !== strpos( db::get('admins'), '1231968913' ); var_dump($a); die;
echo db::get('admins'); die;
var_dump(is_admin(1231968913));die;
var_dump(in_array(1231968913, getAdminIDList()));
var_dump(in_array('php_scripter', getAdminUsernameList())); die;

 // $button = createStringfromArrayforMainMenuButton(json_decode(db::get('button_json'), true));
$array = getButtonArray();
print_r($array);

// $keyboard = Bot::keyboard($output);

// file_put_contents('keyboard.json', $keyboard);

die;

$ar = json_decode(db::get('harga_layanan'), true);
print_r($ar);
// print_r(getButtonArray());
// print_r(getHargaLayanan());

die;
 // echo db::get('button_json'); die;
 // echo db::get('harga_layanan'); die;

  // $array_button = getButtonArray();
  // $harga_layanan = [];
  // foreach($array_button as $kategori => $layanan2){
  //   $layanan2 = array_filter($layanan2);
  //   foreach($layanan2 as $layanan => $jenis_user){
  //     $layanan = trim(str_replace(['[', ']'], '-', str_replace($harga, '', $layanan)));
  //     foreach($jenis_user as $jenis => $harga){
  //       if($jenis == 'user_price'){
  //         $harga_layanan[$layanan]['user_price'] = (float)$harga;
  //       }elseif($jenis == 'vip_member_price'){
  //         $harga_layanan[$layanan]['vip_member_price'] = (float)$harga - ((50/100) * (float)$harga);
  //       }
  //     }
  //   }
  // }
  // db::set('harga_layanan', json_encode($harga_layanan));
  // var_dump ($harga_layanan);


// die;

$array = json_decode(file_get_contents('json.tmp'));
$baru = [];
foreach($array as $kategori => $layanan2){
  foreach($layanan2 as $layanan => $jenis_user){
    foreach($jenis_user as $jenis => $harga){
      $baru[$kategori][$layanan] = [
        'user_price'=>(float)$harga,
        'vip_member_price'=>(float)$harga - ((50/100) * (float)$harga),
      ];
    }
    // $harga = preg_replace('/[^\d\.]/', '', $harga);
  }
}
$json = json_encode($baru);
db::set('button_json', $json);
var_dump(getButtonArray()); 

// die;

// // $json = json_encode($baru, JSON_PRETTY_PRINT);
// // file_put_contents('json.tmp', $json);
// // $json = json_encode($array, JSON_PRETTY_PRINT);
// // file_put_contents('lama.tmp', $json);



die;

var_dump(db::set('vip_members', 1231968913));

die;

foreach(getHargaLayanan() as $layanan => $harga){
  echo "$layanan ---> $harga" . PHP_EOL;
}

die;

echo db::get('hargavip');

die;

echo is_member(867038428) ? 'yes' : 'no';

die;

// $json = json_encode (getButtonArray());
// db::set('button_json', $json);
$menu = json_decode ( file_get_contents('json.tmp'), true );
db::set('button_json', json_encode($menu));
$json = db::get('button_json');
$menu = json_decode ( $json, true );
print_r($menu); 
die;




die;



$main_menu_button = createStringfromArrayforMainMenuButton($menu);
echo $main_menu_button; // for debuging purpose only, delete or comment it after debugging
echo PHP_EOL; // for debuging purpose only, delete or comment it after debugging
$input = readline('pilih: ');
$string = createStringfromArrayforSubMenuButton($input, $menu);
if(!empty($string)){
    if(strpos($string, 'teks') === 0){
        $string = substr($string, strlen('teks'));
        // return Bot::sendMessage($string, ['reply'=>true]);
    }elseif(strpos($string, 'tombol') === 0){
        $string = substr($string, strlen('tombol'));
        // return Bot::sendMessage("Please choose:", ['reply=>true', 'reply_markup'=>Bot::keyboard($string)]);
    }
    echo $string; // for debuging purpose only, delete or comment it after debugging 
}

die;
##################

$a = getButtonArray();
$a = getHargaLayanan();
var_dump($a); 

die;
########################




die;
####################
// if(in_array($text, array_keys($menu))){
//     return Bot::sendMessage("Please choose category: ", [
//         'reply'=>true, 
//         'reply_markup'=>Bot::keyboard(createStringfromArrayforMainMenuButton($menu)),
//     ]);
// }
$main_menu_button = createStringfromArrayforMainMenuButton($menu);
echo $main_menu_button; // for debuging purpose only, delete or comment it after debugging
echo PHP_EOL; // for debuging purpose only, delete or comment it after debugging
$input = readline('pilih: ');
$string = createStringfromArrayforSubMenuButton($input, $menu);
if(!empty($string)){
    if(strpos($string, 'teks') === 0){
        $string = substr($string, strlen('teks'));
        // return Bot::sendMessage($string, ['reply'=>true]);
    }elseif(strpos($string, 'tombol') === 0){
        $string = substr($string, strlen('tombol'));
        // return Bot::sendMessage("Please choose:", ['reply=>true', 'reply_markup'=>Bot::keyboard($string)]);
    }
    echo $string; // for debuging purpose only, delete or comment it after debugging 
}



##############################
die;
##############################

