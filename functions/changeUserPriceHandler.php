<?php
function changeUserPriceHandler($new_price){
  if(is_admin()){
    switch(step()){
      case 'memberTypeToChangePrice':
      $category = db::get('categoryToChangePrice'.fromid());
      $service = db::get('serviceToChangePrice'.fromid());
      $button_array = getButtonArray();
      $current_user_price = $button_array[$category][$service]['user_price'];
      $current_vip_member_price = $button_array[$category][$service]['vip_member_price'];
      setMemberTypeToChangePrice('user_price');
      setStep('newPriceForUser');
      return Bot::sendMessage("Current price for service:\n\n$service\n<b>💰User price: $current_user_price</b>\n💳 VIP member price: $current_vip_member_price\n\nPlease put new price for user member: (number only)", ['reply'=>true, 'parse_mode'=>'html', 'reply_markup'=>Bot::keyboard(getCancelString())]);
    }    
  }
  
  $tombol = Bot::keyboard(
    createStringfromArrayforMainMenuButton(CHANGE_PRICE, 2)
    .getBackButton()
    );

  $options = [
    'reply'=>true,
    'parse_mode'=>'html',
    'reply_markup'=>$tombol,
  ]; 
    
  return Bot::sendMessage('Please choone menu:', $options);
}