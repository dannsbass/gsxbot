<?php

function adminMenuHandler($text)
  {
    $tombol = Bot::keyboard(
      createStringfromArrayforMainMenuButton(ADMIN_MENU, 1)
      .getBackButton()
      );

    $options = [
      'reply'=>true,
      'parse_mode'=>'html',
      'reply_markup'=>$tombol,
    ]; 
      
    return Bot::sendMessage('Please choone menu:', $options);
  }