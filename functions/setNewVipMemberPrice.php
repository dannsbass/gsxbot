<?php
function setNewVipMemberPrice($new_vip_member_price){
  db::set('newVipMemberPrice'.fromid(), $new_vip_member_price);
}