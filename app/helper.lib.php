<?php

function formataCPF($val, $msc="###.###.###-##") {
    $mascara = '';
    $k = 0;
    for($i = 0; $i<strlen($msc); $i++) {
        if($msc[$i] == '#') {
            if(isset($val[$k])) $mascara .= $val[$k++];
        } else {
            if(isset($msc[$i])) $mascara .= $msc[$i];
        }
    }
    return $mascara;
}

function imprimeFuncao($cod, $funcoes) {
  
  return $funcoes[$cod];
}