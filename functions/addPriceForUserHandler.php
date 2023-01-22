<?php
function addPriceForUserHandler(){
  setStep("addPriceForUser");
  return Bot::sendMessage("Please send user chat ID you want to add price",['reply'=>true,'parse_mode'=>'html','reply_markup'=>Bot::keyboard(getCancelString())]);
}