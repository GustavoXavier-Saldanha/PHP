<?php

class Lutador
{
    public $id = 0;
    public $nome = "";
    public $pesoEmQuilos = 0.00;
    public $alturaEmMetros = 0.00;
    public function __contruct($id = 0, $nome = "", $pesoEmQuilos = 0, $alturaEMmETROS = 0)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->pesoEmQuilos = $pesoEmQuilos;
        $this->alturaEmMetros = $alturaEMmETROS;
    }
}
