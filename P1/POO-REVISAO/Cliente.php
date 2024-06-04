<?php
class cliente
{
    public $id;
    public $nome;
    public $telefone;

    public function __construct($nome, $telefone)
    {
        $this->nome = $nome;
        $this->telefone = $telefone;
    }

    function validar()
    {
        $nomeLen = strlen($this->nome);
        $arrErrors = [];
        if ($nomeLen < 2 || $nomeLen > 100) {
            $arrErrors[] = "O nome deve ser preenchido com um valor ente 2 e 100 caracteres";
        }

        foreach ($this->telefone as $tel) {
            $arrErrors[] = $tel->validar()[0];
        }

        return $arrErrors;
    }
}
