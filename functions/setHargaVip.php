<?php
function setHargaVip($layanan, $harga){
  $vip = json_decode(db::get('hargavip'), true);
  $vip[$layanan] = $harga;
  db::set('hargavip', json_encode($vip));
}