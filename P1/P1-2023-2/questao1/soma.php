<?php
$baseData = ["a" => 3, 0 => 0, "b" => 7, "c" => 2, 1 => 5, "d" => 2, 2 => -1, 3 => 0, 4 => -2, "e" => -5];


function somaSeparada($baseData)
{
    $somaNumeric = 0;
    $somaStr = 0;

    foreach ($baseData as $b => $i) {
        if (is_numeric($b)) {
            $somaNumeric += $i;
        } else {
            $somaStr += $i;
        }
    }
    return ["numeros" => $somaNumeric, "letras" => $somaStr];
}

//print_r(somaSeparada($baseData));

echo "2,99"<"3";