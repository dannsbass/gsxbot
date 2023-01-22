<?php
function removeService($category, $service){
  $button_array = getButtonArray();
  unset($button_array[$category][$service]);
  db::set('button_json', json_encode($button_array));
}