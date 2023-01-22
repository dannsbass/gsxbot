<?php
function chatIdHandler($cocok){
  if(is_admin()){
    $chat_id = $cocok[0];
    
    switch(step()){
      
      case 'sendUserIdToBeAdded': return addUserHandler($chat_id);
      case 'sendUserIdToBeRemoved': return removeUserHandler($chat_id);
      case 'sendAdminIdToBeAdded': return addAdminHandler($chat_id);
      case 'sendAdminIdToBeRemoved': return removeAdminHandler($chat_id);
      
      case 'addPriceForUser':
      setStep("addPriceAmount");
      db::set('userChatIdToAddPriceAmount'.fromid(), $chat_id);
      return Bot::sendMessage("Please send price amount to add: (number only)",['reply'=>true]);
      
    }
    
    return Bot::sendMessage($chat_id);
    
  }
}