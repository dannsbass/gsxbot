<?php
function createStringfromArrayforSubMenuButton(string $input, array $menu){
    $tombol = '';
    foreach ($menu as $key => $value) {
        if(is_array($value)){
            if($input == $key){
                $new_ar = array_chunk(array_keys($value), 2);
                foreach ($new_ar as $k => $v) {
                    if(is_array($v)){
                        $v = str_replace(['[', ']'], '-', $v);
                        $tombol .= "tombol";
                        $tombol .= $k <= count($value) ? '[' : '';
                        $tombol .= implode('][', $v)."]\n";
                        break;
                    }
                }
            }else{
                $tombol .= createStringfromArrayforSubMenuButton($input, $value);
            }
        }else{
            if($input == $key){
                $tombol .= "$key: $value\n";
                break;
            }
        }
    }
    return $tombol;
}