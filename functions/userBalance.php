<?php
function userBalance($from_id=''){
  $from_id = empty($from_id) ? fromid() : $from_id;
  return "balance_$from_id";
}