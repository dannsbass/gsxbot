<?php
function resetDaftarHargaVip(){
  $vip = [];
  foreach(array_keys(getHargaLayanan()) as $layanan){
    $vip[$layanan] = 0;
  }
  db::set('hargavip', json_encode($vip));
}