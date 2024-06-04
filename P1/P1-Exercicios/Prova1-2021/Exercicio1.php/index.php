<?php

function contabilizar($entrada)
{
    $arrQtd = [];
    foreach ($entrada as $e) {
        if (isset($arrQtd[$e])) {
            $arrQtd[$e]++;
        } else {
            $arrQtd[$e] = 1;
        };
    };
    return $arrQtd;
};

$entrada = ["maça", "uva", "maça", "banana", "goiaba", "uva", "maça", "banana"];

$saida = contabilizar($entrada);

var_dump($saida);
