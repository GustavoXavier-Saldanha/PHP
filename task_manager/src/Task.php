<?php

class Task // MODEL
{
    public $id = 0;
    public $titulo = '';
    public $descricao = '';
    public $status = 'pending';
    public $dataCriacao = date("Y-m-d H:i:s");
    public $dataAtualizacao = date("Y-m-d H:i:s");

    function __construct(
        $id,
        $titulo,
        $status,
        $descricao,
        $dataAtualizacao
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->status = $status;
        $this->descricao = $descricao;
        $this->dataAtualizacao = $dataAtualizacao;
    }
}
