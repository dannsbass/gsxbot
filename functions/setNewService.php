<?php
function setNewService($service){
  db::set('newService'.fromid(), $service);
}