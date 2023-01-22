<?php
function removeCategory($category){
  $button_array = getButtonArray() ?? [];
  unset($button_array[$category]);
  db::set('button_json', json_encode($button_array));
}