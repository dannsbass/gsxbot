<?php
function getGuestIDsHandler($text='')
  {
    if(!is_admin()) return false;
    return Bot::sendMessage(getGuestIDs(), ['parse_mode'=>'html', 'reply'=>true]);
  }