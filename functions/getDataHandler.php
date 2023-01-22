<?php

function getDataHandler($target){
  if(!is_admin()) return false;
  //$target = $cocok[1];
  if(empty(trim(db::keys($target))) or empty(trim(db::get($target)))) return Bot::sendMessage('Nothing to show');
  $konten = db::get($target);
  if(strlen($konten) > 4096){
    $file = 'file.txt';
    file_put_contents($file, $konten);
    $res = Bot::sendDocument($file);
    unlink($file);
    return $res;
  }
  return Bot::sendMessage($konten);
}