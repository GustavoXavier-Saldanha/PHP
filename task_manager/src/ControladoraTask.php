<?php

require_once 'conexao.php';

require_once 'RepositorioTask.php';
require_once 'VisaoTask.php';
require_once 'Task.php';

class ControladoraTask
{

    private $visao;
    private $repositorio;

    function _construct()
    {
        $this->repositorio = new RepositorioTaskEmBDR(conexao());
    }


    function obterTodos()
    {
        try {
            return $this->repositorio->buscarTodos();
        } catch (Exception $e) {
            throw new Exception('');
        }
    }

    function cadastrar(Task &$task)
    {
        try {
            $this->repositorio->cadastrar($task);
        } catch (Exception $e) {
            throw new Exception('');
        }
    }
    function atualizar(Task $task)
    {
        try {
            $this->repositorio->atualizar($task);
        } catch (Exception $e) {
            throw new Exception('');
        }
    }
    function excluir($id)
    {
        try {
            $this->repositorio->excluir($id);
        } catch (Exception $e) {
            throw new Exception("");
        }
    }
}
