<?php
function autoUpdateLayananVip(){
  $vip = json_decode(db::get('hargavip'), true);
  $biasa = getHargaLayanan();
  foreach($biasa as $layanan => $harga){
    if(!in_array($layanan, array_keys($vip))){
      $vip[$layanan] = 0;
    }
  }
  db::set('hargavip', json_encode($vip));
}
