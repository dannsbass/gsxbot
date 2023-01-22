<?php
function setCategoryToRemoveService($category){
  db::set('categoryToRemoveService'.fromid(), $category);
}