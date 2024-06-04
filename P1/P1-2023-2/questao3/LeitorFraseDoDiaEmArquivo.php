<?php

require_once 'LeitorFraseDoDia.php';

use frase\LeitorFraseDoDia;

class LeitorFraseDoDiaEmArquivo implements LeitorFraseDoDia
{
    public function ler(): string
    {
        $data = file_get_contents("frases.txt");
        $dataSeparated = explode("\n", $data);
        $index = rand(0, 9);

        return $dataSeparated[$index];
    }
}
$leitor = new LeitorFraseDodIaEmArquivo;
echo $leitor->ler();
