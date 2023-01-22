<?php
function removeServiceHandler(){
  $button_array = getButtonArray() ?? [];
  if(count($button_array) === 0){
    return Bot::sendMessage('No category to choose', ['reply'=>true]);
  }
  setStep('chooseCategoryToRemoveService');
  return Bot::sendMessage("Please choose category", ['reply'=>true, 'reply_markup'=>Bot::keyboard(createStringfromArrayforMainMenuButton($button_array).getCancelString())]);
}