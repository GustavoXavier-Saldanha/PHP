<?php

namespace acme;

class Fornecedor
{
    public $id = 0;
    public $codigo = '';
    public $nome = '';
    public $email = '';
    public $cnpj = '';
    public $telefone = '';

    public function __construct($id = 0, $codigo = '', $nome = '', $email = '', $cnpj = '', $telefone = '')
    {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->email = $email;
        $this->cnpj = $cnpj;
        $this->telefone = $telefone;
    }

    function valor(array $a, $chave, $default){
        return htmlspecialchars( isset($a[$chave] )) ? $a[$chave] : $default;
    }
}
