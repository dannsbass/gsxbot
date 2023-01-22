<?php
function step($step=''){
  if(empty($step)) return db::get('step'.fromid());
  return setStep($step);
}