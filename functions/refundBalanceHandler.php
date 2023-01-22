<?php
function refundBalanceHandler(){
  $tombol = Bot::keyboard(createStringfromArrayforMainMenuButton(REFUND_BALANCE, 2).getBackButton());
  return Bot::sendMessage('Testing', ['reply'=>true, 'reply_markup'=>$tombol]);
}