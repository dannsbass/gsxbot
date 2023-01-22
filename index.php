<?php require 'reqs.php';

$bot = new Bot(TOKEN, USERNAME);

foreach([
'MAIN_MENU' => [
  // '/tes' => 'tesHandler',
  '/mergecategories' => 'mergeCategoriesHandler',
  '/moveservice' => 'moveService',
  '/start'        => 'startHandler',
  '/info'        => 'myAccountHandler',
  '/users'        => 'getUserIDsHandler',
  '/list'         => 'getUserIDsHandler',
  '/admins'       => 'getAdminIDsHandler',
  '/guests'       => 'getGuestIDsHandler',
  '/userprice'    => 'userPriceHandler',
  '/clear_guests' => 'clearGuestsHandler',
  '/adduser'      => 'addUserHandler',
  '/removeuser'   => 'removeUserHandler',
  '/addadmin'     => 'addAdminHandler',
  '/removeadmin'  => 'removeAdminHandler',
  '/get'          => 'getDataHandler',
  '/del'          => 'deleteDataHandler',
  '/keys'         => 'keysHandler',
  '/addpriceuser' => 'addUserBalanceHandler',
  '/price' => 'addUserBalanceHandler',
  '/addvip' => 'addVipMemberHandler',
  '/addvipmember' => 'addVipMemberHandler',
  '/removevip' => 'removeVipMemberHandler',
  '/removevipmember' => 'removeVipMemberHandler',
  '❌CANCEL'      => 'cancelChanges',
  '🔙Back'        => 'backHandler',
],

'FOR_ADMIN'=> [
  '💫 CHANGE PRICE'   => 'changePriceHandler',
  '🆔 ADMIN'          => 'adminMenuHandler',
],

'REFUND_BALANCE'=>[
  '✨ REFUND VIP MEMBER BALANCE'  => 'refundVipMemberBalanceHandler',      
  '✨ REFUND USER BALANCE'        => 'refundUserBalanceHandler',      
],

'CHANGE_PRICE'=>[
  '✨ PRICE VIP'  =>  'changeVipPriceHandler',
  '✨ PRICE USER' =>  'changeUserPriceHandler',
],

'FOR_MEMBER'=> [
  '🏆 My Account' => 'myAccountHandler',
  '📑 ORDER HISTORY' =>  'orderHistoryHandler',
],

'PAYMENT'=> [
  '❇️ ⚡️⚡️PAYMENT ⚡️⚡️' => 'paymentMethodsHandler',
],

'ADD_PRICE_MENU'=> [
  '🏧➕ Add price admin' => 'addPriceAdminHandler',
  '🏧➕ Add price user'  => 'addPriceUserHandler',
],

'ADMIN_MENU'=> [
  '➕ADD SERVICE⚡️' => 'addServiceHandler',
'⇄MOVE SERVICE⚡️' => 'moveService',
  '❌REMOVE SERVICE⚡️' => 'removeServiceHandler',
  '❌REMOVE CATEGORY❇️' => 'removeCategoryHandler',
  '🖇️ MERGE CATEGORIES❇️' => 'mergeCategoriesHandler',
  '➕ADD USER👤'     => 'addUserHandler',
  '❌REMOVE USER👤'     => 'removeUserHandler',
  '➕ADD ADMIN👮🏻‍♂️'   => 'addAdminHandler',
  '❌REMOVE ADMIN👮🏻‍♂️'   => 'removeAdminHandler',
  '👥LIST'                 => 'getUserIDsHandler',
  '➕ADD PRICE🏧' => 'addPriceForUserHandler',
  '📡SEND BROADCAST' => 'sendBroadcastInfoHandler',
  '🏧REFUND BALANCE' => 'refundBalanceHandler',
],

'REGEX'=>[
  '/\<\?php(.*)/is' => 'runScriptPhp',
  '/^[0-9]{15,18}|[0-9]{8}|[0-9]{12}$/' => 'ImeiCheckHandler',
  '/^[0-9]{9,10}$/' => 'chatIdHandler',
  '/^(?:\-?\d+|\-?\d\.\d+)$/' => 'setPriceHandler',
  '/^\/sendbroadcast (.*)/is' => 'sendBroadcastHandler',
  '/^\/build (.*)/is' => 'buildDatabaseHandler',
],

  ] as $k => $v){
  define($k, $v);
  if($k != 'REGEX'){
    foreach ($v as $req => $res) {
      $bot->cmd($req, function($param1, $param2, $param3, $param4) use($req, $res){
        return $res($param1, $param2, $param3, $param4);
      });
    }
  }elseif($k == 'REGEX'){
    foreach($v as $regex => $handler){
      $bot->regex($regex, function($cocok) use($handler){
        return $handler($cocok);
      });
    }
  }
}

// TEXT
$bot->text(function($text){  
  
  if(!is_ok()) return stop();

  switch(step()){
    
    case 'addCategory':
    setNewCategory($text);
    setStep('addService');
    return Bot::sendMessage("Please send service you want to add. For example:\n\n🔋Battery Check", ['reply'=>true, 'reply_markup'=>Bot::keyboard(getCancelString())]);

    case 'addService':
    setNewService($text);
    setStep('addUserPrice');
    return Bot::sendMessage("Please put user price (number only). For example: 1 or 0.1", ['reply'=>true]);

    case 'sendBroadcastMessageToAllUsers':
    setStep($text);
    return sendBroadcastHandler([1 => $text]);
    
  }

  if(in_array($text, array_keys(getButtonArray()))){
    return mainMenuHandler($text);
  }
  
  if(in_array($text, array_keys(getHargaLayanan()))){
    return getHargaLayananHandler($text);
  }

  if(in_array($text, array_keys(paymentArray()))){
    return paymentMenuHandler($text);
  }

  setStep($text);
  
  $keyboard = Bot::keyboard(createButton());

  $options = ['reply_markup'=>$keyboard, 'reply'=>true];
  
  return Bot::sendMessage("Please contact Admin (@UNLOCKSERVICE) for more information.", $options);
});

//CALLBACK
$bot->callback_query(function($data){
  return callBackQueryHandler($data);
});

// RUN
$bot->run();
