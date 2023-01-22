<?php
function createStringfromArrayforMainMenuButton(array $menu, int $chunk = 2):string{
  $menu = enkod_array($menu);
    $tombol = '';
    $new_menu = array_chunk(array_keys($menu), $chunk);
    foreach ($new_menu as $key => $value) {
        // $value = str_replace(['[', ']'], '🔹', $value);
        if($key <= count($new_menu)) {
            $tombol .= '[';
        }
        $tombol .= implode("][", $value)."]\n";
    }
    return $tombol;
}

/*
str_replace(['[', ']'], '🔹', $key)
*/