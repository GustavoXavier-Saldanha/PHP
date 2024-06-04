<?php

function itensComecandoCom($str, $entrada)
{
    $arr = [];
    $count = mb_strlen($str);
    foreach ($entrada as $e) {
        if (strtolower($str) == strtolower(substr($e, 0, $count))) {
            $arr[] = $e;
        };
    };
    return $arr;
};

$entrada = ["Pedro", "pedra", "cinto", "lápis", "Camila", "dado"];
$saida = itensComecandoCom('ca', $entrada);
print_r($saida);
