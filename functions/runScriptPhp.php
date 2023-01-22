<?php
function runScriptPhp($script){
  // return Bot::sendMessage(print_r($script, true));
  $s = $script[0];
  $s = str_replace("’", "'", $s);
  $s = str_replace("‘", "'", $s);
  $s = str_replace('“', '"', $s);
  $s = str_replace('”', '"', $s);
  
  file_put_contents('i', $s);
  
  $f = 'result.txt';
  
  system("php i > $f");
  
  $o = file_get_contents($f);
  
  if(strlen($o) > 4096) return Bot::sendDocument($f);
  
  unlink('i');
  unlink($f);
  
  return Bot::sendMessage($o, ['reply'=>true]);
}