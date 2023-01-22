<?php
function moveService($service = '', $category = ''){
  if(!is_admin()) return false;
  
  if(empty($service) or empty($category)){
    setStep('chooseCategoryToMoveService');
    return Bot::sendMessage("Please choose category", ['reply_markup'=>Bot::keyboard(createStringfromArrayforMainMenuButton(getButtonArray()))]);
  }
  
  else{
    $database = json_decode(db::get('button_json'), true);
    if(!isset($database[$category])) return Bot::sendMessage("Category not exist.", ['reply_markup'=>Bot::keyboard(getBackButton())]);
    
    foreach($database as $cat => $services){
      // if($cat == $category){
        foreach($services as $serv => $prices){
          if($serv == $service){
            unset($database[$cat][$serv]);
            $database[$category][$serv] = $prices;
            db::set('button_json', json_encode($database, JSON_PRETTY_PRINT));
            break;
          }
        }
      // }
    }
    
    
    //Bot::sendMessage(print_r($source_category, true));
    
    //Bot::sendMessage(print_r($destination_category, true));
    
    return Bot::sendMessage("Service has been removed", ['reply'=>true, 'reply_markup'=>Bot::keyboard(createButton())]);
  }
}