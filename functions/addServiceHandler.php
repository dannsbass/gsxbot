<?php
function addServiceHandler(){
  setStep('addCategory');
  return Bot::sendMessage("Please send category you want to add. For example:\n\n❇️ HARDWARE INFO\n\nOr choose existing category:", ['reply'=>true, 'reply_markup'=>Bot::keyboard(createStringfromArrayforMainMenuButton(getButtonArray()).getCancelString())]);
}