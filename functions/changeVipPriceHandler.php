<?php
function changeVipPriceHandler($new_price){
  if(is_admin()){
    switch(step()){
      case 'memberTypeToChangePrice':
      $category = db::get('categoryToChangePrice'.fromid());
      $service = db::get('serviceToChangePrice'.fromid());
      $button_array = getButtonArray();
      $current_user_price = $button_array[$category][$service]['user_price'];
      $current_vip_member_price = $button_array[$category][$service]['vip_member_price'];
      setMemberTypeToChangePrice('vip_member_price');
      setStep('newPriceForVipMember');
      return Bot::sendMessage("Current price for service:\n\n$service\n💰User price: $current_user_price\n<b>💳VIP member price: $current_vip_member_price</b>\n\nPlease put new price for VIP member: (number only)", ['reply'=>true, 'parse_mode'=>'html', 'reply_markup'=>Bot::keyboard(getCancelString())]);
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