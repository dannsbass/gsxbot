<?php
function setServiceToChangePrice($category){
  db::set('serviceToChangePrice'.fromid(), $category);
}