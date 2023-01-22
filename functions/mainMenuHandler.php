<?php

function mainMenuHandler($text)
  {
    $message = "Please choose service";
    $add_button = getBackButton();

    if(is_admin()){
      switch(step()){

        case 'chooseSourceCategoryToMerge':
      	setStep( 'chooseDestinationCategoryToMerge');
      	db::set( 'sourceCategoryToMerge' .fromid(), $text);
      	return Bot::sendMessage("Please choose DESTINATION category you want to merge",  ['reply_markup' => Bot::keyboard( createStringfromArrayforMainMenuButton( getButtonArray()).getCancelString())]);
      	
      	case 'chooseDestinationCategoryToMerge':
      	clearStep();
      	mergeCategories( db::get( 'sourceCategoryToMerge' .fromid()), $text);
        db::del( 'sourceCategoryToMerge' .fromid());
      	return Bot::sendMessage("Categories merged",  ['reply_markup' => Bot::keyboard(getBackButton())]);

        case 'moveServiceToCategory':
        setStep($text);
        $service = db::get('serviceToMove'.fromid());
        return moveService($service, $text);

        case 'chooseCategoryToMoveService':
        setStep('chooseServiceToMove');
        db::set('serviceToMove', $text);
        $message = "Please chose service to move";
        break;
        
        case 'chooseCategoryToRemoveService':
        setCategoryToRemoveService($text);
        setStep('chooseServiceToBeRemoved');
        $message = "Please choose service you want to remove";
        $add_button = getCancelString();
        break;

        case 'chooseCategoryToChangePrice':
        setCategoryToChangePrice($text);
        setStep('chooseServiceToChangePrice');
        $message = "Please choose service you want to change its price";
        $add_button = getCancelString();
        break;

        case 'chooseCategoryToBeDeleted';
        removeCategory($text);
        setStep($text);
        return Bot::sendMessage("Category has been deleted",['reply'=>true, 'reply_markup'=>Bot::keyboard(createButton())]);
      }
    }
    
    $array_tombol = getButtonArray()[$text];
    $tombolKecil = createSubBottonString($array_tombol);
    
    $keyboard = Bot::keyboard($tombolKecil . $add_button);
    
    $options = ['reply_markup'=>$keyboard, 'reply'=>true];
    return Bot::sendMessage($message, $options);

  }