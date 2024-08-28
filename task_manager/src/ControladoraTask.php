<?php

require_once 'conexao.php';

require_once 'RepositorioTask.php';
require_once 'VisaoTask.php';



class ControladoraTask
{

    private $visao;
    private $repositorio;

    function _construct(VisaoTask $visao)
    {
        $this->visao = $visao;
        $this->repositorio = new RepositorioTaskEmBDR(conexao());
    }


    function obterTodos(){
        $dados = $this->visao->buscarTodos();
        try{
            $this->repositorio->buscarTodos();
            $this->visao->;
        } catch(Exception $e){
            throw new Exception('');
        }
    }
}
