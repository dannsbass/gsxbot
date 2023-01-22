<?php
function setCategoryToChangePrice($category){
  db::set('categoryToChangePrice'.fromid(), $category);
}