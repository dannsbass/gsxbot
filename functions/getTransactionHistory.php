<?php
function getTransactionHistory($fromid=''){
  $fromid = empty($fromid) ? fromid() : $fromid;
  return db::get("transaction_history$fromid"); // see: ImeiCheckHandler
}