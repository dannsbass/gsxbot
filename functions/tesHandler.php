<?php
function tesHandler(){
  
  $button = createStringfromArrayforMainMenuButton(json_decode(db::get('services_list'), true));

  $keyboard = Bot::keyboard($button);
  $keyboard = html_entity_decode($keyboard);
  
  return Bot::sendMessage($keyboard, ['reply'=>true, /*'parse_mode'=>'html',*/ 'reply_markup' => $keyboard]);
}
