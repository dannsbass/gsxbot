<?php
function autoRemoveEmptyCategory(){
  $button_array = getButtonArray();
  foreach($button_array as $category => $service){
    if(is_array($service) and count($service) === 0){
      unset($button_array[$category]);
    }
  }
  db::set('button_json', json_encode($button_array));
}