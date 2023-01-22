<?php
function keysHandler($target){
  if(!is_admin()) return;
  $hasil = db::keys($target);
  if(empty(trim($hasil))){
    $hasil = 'Kosong';
  }
  return Bot::sendMessage($hasil);
}