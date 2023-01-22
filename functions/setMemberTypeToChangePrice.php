<?php
function setMemberTypeToChangePrice($type){
  db::set('memberTypeToChangePrice'.fromid(), $type);
}