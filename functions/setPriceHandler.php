<?php
function setPriceHandler($cocok){
  
  if(is_admin()){
    switch(step()){

      case 'addPriceAmount':
      $price = (float)$cocok[0];
      $chat_id = db::get('userChatIdToAddPriceAmount'.fromid());
      return addUserBalanceHandler($chat_id, $price);

      case 'newPriceForUser':
      $category = db::get('categoryToChangePrice'.fromid());
      $service = db::get('serviceToChangePrice'.fromid());
      $new_price = $cocok[0];
      $button_array = getButtonArray();
      $button_array[$category][$service]['user_price'] = $new_price;
      $vip_member_price = $button_array[$category][$service]['vip_member_price'];
      db::set('button_json', json_encode($button_array));
      Bot::sendMessage("<b>✅Success! User member price has been succesfully changed</b>\n\n$category\n$service\n<b>💰User price: $new_price</b>\n💳VIP member price: $vip_member_price", ['reply'=>true, 'parse_mode'=>'html', 'reply_markup'=>Bot::keyboard(getBackButton())]);
      setStep('newPriceForVipMember');
      return Bot::sendMessage("Please put new price for VIP member: (number only)", ['reply_markup'=>Bot::keyboard(getCancelString())]);
      
      case 'newPriceForVipMember':
      $category = db::get('categoryToChangePrice'.fromid());
      $service = db::get('serviceToChangePrice'.fromid());
      $new_price = $cocok[0];
      $button_array = getButtonArray();
      $button_array[$category][$service]['vip_member_price'] = $new_price;
      $user_price = $button_array[$category][$service]['user_price'];
      db::set('button_json', json_encode($button_array));
      setStep($cocok[0]);
      return Bot::sendMessage("<b>✅Success! VIP member price has been succesfully changed</b>\n\n$category\n$service\n💰User price: $user_price\n<b>💳VIP member price: $new_price</b>", ['reply'=>true, 'parse_mode'=>'html', 'reply_markup'=>Bot::keyboard(getBackButton())]);

      case 'addUserPrice':
      setNewUserPrice($cocok[0]);
      setStep('addVipMemberPrice');
      return Bot::sendMessage("Please put new price for VIP member: (number only)", ['reply'=>true, 'reply_markup'=>Bot::keyboard(getCancelString())]);

      case 'addVipMemberPrice':
      setNewVipMemberPrice($cocok[0]);
      $new_category = db::get('newCategory'.fromid());
      $new_service = db::get('newService'.fromid());
      $new_user_price = db::get('newUserPrice'.fromid());
      $new_vip_member_price = db::get('newVipMemberPrice'.fromid());
      $button_array = getButtonArray() ?? [];
      $button_array[$new_category][$new_service]['user_price'] = $new_user_price;
      $button_array[$new_category][$new_service]['vip_member_price'] = $new_vip_member_price;
      db::set('button_json', json_encode($button_array));
      setStep($cocok[0]);
      return Bot::sendMessage("✅<b>Success</b>\n\n$new_category\n$new_service\n💰User price: $new_user_price\n💳 VIP member price: $new_vip_member_price", ['parse_mode'=>'html', 'reply'=>true, 'reply_markup'=>Bot::keyboard(createSubBottonString(getButtonArray()[$new_category]) . getBackButton())]);
      return;
    }
  }
  /*
  if(!is_admin() or !is_ready_to_change_price() or !is_editor()) return;
  $fromid = Bot::message()['from']['id'];
  $harga = $cocok[0];
  $layanan = db::get('ready_to_change'.$fromid);
  $hargaLayanan = getHargaLayanan();
  setHargaLayanan($layanan, $harga);
  $res = Bot::sendMessage($layanan . "\n" . getJawabanHarga($harga), ['reply'=>true, 'reply_markup'=>Bot::keyboard(getBackButton())]);
  db::set('change_price'.$fromid, 'off');
  db::set('ready_to_change'.$fromid, '');
  db::set('editor_is'.$fromid, 'no');
  return $res;
  */
}