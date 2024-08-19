<?php

class Conta
{
    public $id = '';

    public $descricao = '';

    public $valor = 0.00;

    public function __construct(
        $id = '',
        $descricao = '',
        $valor = 0.00
    ) {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->valor = $valor;
    }
}
