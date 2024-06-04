<?php
$data = file_get_contents("pereciveis.csv");
$dataDivided = explode("\n", $data);
array_shift($dataDivided);

//agora os dados estão assim:
//[0] => "nomeproduto;datavalidade"
//[1] => "nomeprod2;datavalidade2"
foreach ($dataDivided as $linha) {
    $dataCorrente = '05/05/2023';
    $dia = substr($dataCorrente, 0, 2);
    $mes = substr($dataCorrente, 3, 2);
    $ano = substr($dataCorrente, 6, 4);

    $linhaDivided = explode(";", $linha);
    //[
    // [0]=> nome
    // [1] => validade
    //]
    //print_r($linhaDivided);
    $diaCompare = substr($linhaDivided[1], 0, 2);
    $mesCompare = substr($linhaDivided[1], 3, 2);
    $anoCompare = substr($linhaDivided[1], 6, 4);

    $d1 = $ano . $mes . $dia;
    $d2 = $anoCompare . $mesCompare . $diaCompare;
    if ($d1 >  $d2) {
        echo 'Produto ' . $linhaDivided[0] . ' Dias Vencidos: ' . ($d1 - $d2), PHP_EOL;
    };
};
