<?php
function createSubBottonString($array_tombol){
  $array_tombol = enkod_array($array_tombol);
  $tombolKecil = '';
  $ke = 1;
  foreach($array_tombol as $layanan => $harga){
    $tombolKecil .= "[".$layanan."]";
    if($ke%2 == 0){
      $tombolKecil .= "\n";
    }
    $ke++;      
  }
  return $tombolKecil;
}