<?php

function deleteDataHandler($target){
  if(!is_admin()) return false;
  if(empty(trim(db::keys(''.$target)))){
     $pesan = $target." not found";
  }else{
    db::del($target);
    $pesan = $target." has been deleted";
  }
return Bot::sendMessage($pesan, ['reply'=>true]);
}