<?php

function getHargaLayananHandler($text){
  
  $jawaban = getJawabanHarga(getHargaLayanan()[$text]);

  if(is_admin()){
    switch(step()){
      case 'chooseServiceToMove':
      setStep('moveServiceToCategory');
      db::set('serviceToMove'.fromid(), $text);
      return Bot::sendMessage("Choose destination category", ['reply'=>true, 'reply_markup' => Bot::keyboard(createStringfromArrayforMainMenuButton(getButtonArray()).getCancelString())]);
      
      case 'chooseServiceToBeRemoved':
      removeService( db::get( 'categoryToRemoveService' . fromid()), $text);
      setStep($text);
      return Bot::sendMessage("Service has been removed", ['reply'=>true, 'reply_markup' => Bot::keyboard(getBackButton())]);

      case 'chooseServiceToChangePrice':
      setServiceToChangePrice($text);
      setStep('newPriceForUser');
      return Bot::sendMessage("Current price is:\n\n$jawaban\n\nPlease put new price for user: (number only)", ['parse_mode'=>'html', 'reply'=>true, 'reply_markup'=>Bot::keyboard(getCancelString())]);
    }
  }

  setStep($text);
  
  return Bot::sendMessage($jawaban, ['reply'=>true, 'parse_mode'=>'html']);
}
