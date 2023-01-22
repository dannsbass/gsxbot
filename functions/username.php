<?php
function username(){
  $tg = Bot::message();
  $name = $tg['from']['first_name'];
  $name .= empty($tg['from']['last_name']) ? '' : ' ' . $tg['from']['last_name'];
  return $name;
}