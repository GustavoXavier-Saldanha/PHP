<?php

class Produto
{
    public $codigo;
    public $descricao;
    public $estoque;
    public $preco;

    public function __construct($codigo = "000000", $descricao = "aa", $estoque = 0, $preco = 0.2)
    {
        $this->descricao = $descricao;
        $this->codigo = $codigo;
        $this->estoque = $estoque;
        $this->preco = $preco;
    }

    function validar()
    {
        $arrErrors = [];
        if (!is_numeric($this->codigo) || strlen($this->codigo) !== 6) {
            array_push($arrErrors, "codigo");
        }
        $descLen = strlen($this->descricao);
        if ($descLen < 2 || $descLen > 100) {
            array_push($arrErrors, "descricao");
        }
        if (!is_float($this->preco) || $this->preco < 0.01) {
            array_push($arrErrors, "preco");
        }
        if (!is_numeric($this->estoque) || $this->estoque < 0) {
            array_push($arrErrors, "estoque");
        }
        print_r($arrErrors);
    }
}

$prod = new Produto();
$prod->validar();
