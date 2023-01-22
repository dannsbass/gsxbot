<?php

function getAdminIDList(){
  return array_merge(getOwnerIDList(), array_filter(explode(' ', trim(db::get('admins')))));
}
