<?php
function setStep($req){
  db::set('step'.fromid(), $req);
}