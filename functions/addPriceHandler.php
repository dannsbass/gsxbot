<?php
function addPriceHandler($text){
  $keyboard = Bot::keyboard(createStringfromArrayforMainMenuButton(ADD_PRICE_MENU).getBackButton());
  return Bot::sendMessage("Please select", ['reply'=>true, 'reply_markup'=>$keyboard]);
}