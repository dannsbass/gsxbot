<?php
function createButton(){
  $button_array = getButtonArray();
  if(empty($button_array) or count($button_array) === 0){
    $button_array = [];
  }
  $tombol = '';
  $tombol .= createStringfromArrayforMainMenuButton($button_array);
  // $i = 1;
  // foreach(getButtonArray() as $key => $value){
  //  $tombol .= "[".str_replace(['[', ']'], '🔹', $key)."]";
  //  if($i%2 == 0){
  //   $tombol .= "\n";
  //  }
  //  $i++;
  // }
  $tombol .= "\n".createStringfromArrayforMainMenuButton(PAYMENT);
  if(is_member()){
    $tombol .= "\n".createStringfromArrayforMainMenuButton(FOR_MEMBER);
  }
  if(is_admin()){
    $tombol .= "\n".createStringfromArrayforMainMenuButton(FOR_ADMIN, 1);
  }
  return $tombol;
}
