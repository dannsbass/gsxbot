<?php

function clearGuestsHandler($text)
  {
    if(!is_admin()) return;
    db::del('guests');
    return getGuestIDsHandler();
  }