<?php
function changePriceHandler(){
  setStep('chooseCategoryToChangePrice');
  return Bot::sendMessage("Please choose category of service", ['reply'=>true, 'reply_markup'=>Bot::keyboard(createStringfromArrayforMainMenuButton(getButtonArray()).getCanCelString())]);
}