<?php

function getHargaLayanan(){
  $array_button = getButtonArray();
  $harga_layanan = [];
  foreach($array_button as $kategori => $layanan2){
    $layanan2 = array_filter($layanan2);
    foreach($layanan2 as $layanan => $jenis_user){
      foreach($jenis_user as $jenis => $harga){
        if($jenis == 'user_price'){
          $harga_layanan[$layanan]['user_price'] = (float)$harga;
        }
        elseif($jenis == 'vip_member_price'){
          $harga_layanan[$layanan]['vip_member_price'] = (float)$harga;
        }
        elseif($jenis == 'admin_price'){
          $harga_layanan[$layanan]['admin_price'] = (float)$harga;
        }
        elseif($jenis == 'service_number'){
          $harga_layanan[$layanan]['service_number'] = (int)$harga;
        }
      }
    }
  }
  $harga_layanan = dekod_array($harga_layanan);
  db::set('harga_layanan', json_encode($harga_layanan));
  return $harga_layanan;
}

/*
🔹
*/