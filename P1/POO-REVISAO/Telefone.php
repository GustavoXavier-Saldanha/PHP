<?php

class Telefone
{
    public $id;
    public $numero;

    function __construct($numero)
    {
        $this->numero = $numero;
    }

    public function validar()
    {
        $arrErrors = [];

        if (strlen($this->numero) !== 11 || !is_numeric($this->numero)) {
            $arrErrors[] =  $this->numero . ' - O número deve ser um valor numerico e com 11 números!';
        }
        return $arrErrors;
    }
}
