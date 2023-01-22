<?php
function setNewCategory($category){
  db::set('newCategory'.fromid(), $category);
}