<?php
function removeCategoryHandler(){
  $button_array = getButtonArray() ?? [];
  if(count($button_array) === 0){
    return Bot::sendMessage('Category empty', ['reply'=>true]);
  }
  setStep('chooseCategoryToBeDeleted');
  return Bot::sendMessage("Please choose category to be deleted", ['reply'=>true, 'reply_markup'=>Bot::keyboard(createStringfromArrayforMainMenuButton(getButtonArray()).getCancelString())]);
}