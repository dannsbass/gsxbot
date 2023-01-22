<?php

function setHargaLayanan($layanan_baru, $harga_baru, $jenis_user){
  $harga_baru = preg_replace('/[^\d\.]/', '', $harga_baru);
  $array = json_decode ( db::get('button_json'), true );
  $button_json = [];
  $harga_layanan = [];
  foreach($array as $kategori => $layanan2){
    foreach($layanan2 as $layanan => $jenis_user_harga){
      $layanan = trim(str_replace(['[', ']'], '-', str_replace($harga, '', $layanan)));
      foreach($jenis_user_harga as $jenis_user => $harga){
        if($layanan == $layanan_baru){
          if($jenis_user == 'vip_member_price'){
            $button_json[$kategori][$layanan][$jenis_user] = (float)$harga_baru;
            $harga_layanan[$layanan][$jenis_user] = (float)$harga_baru;
          }else{
            $button_json[$kategori][$layanan][$jenis_user] = (float)$harga_baru;
            $harga_layanan[$layanan][$jenis_user] = (float)$harga_baru;
          }
        }
        else{
          $button_json[$kategori][$layanan][$jenis_user] = (float)$harga;
          $harga_layanan[$layanan][$jenis_user] = (float)$harga;
        }
      }
    }
  }
  db::set('harga_layanan', json_encode($harga_layanan));
  db::set('button_json', json_encode($button_json));
}