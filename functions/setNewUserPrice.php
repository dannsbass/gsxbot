<?php
function setNewUserPrice($user_price){
  db::set('newUserPrice'.fromid(), $user_price);
}