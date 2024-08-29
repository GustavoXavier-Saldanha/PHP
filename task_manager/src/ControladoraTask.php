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

    function cadastrar()
    {
        try {
            $dados = $_POST;
            $task = new Task(
                0,
                isset($dados['titulo']) ? $dados['titulo'] : '',
                isset($dados['descricao']) ? $dados['descricao'] : '',
                isset($dados['status']) ? $dados['status'] : '',
                new DateTime(),
                new DateTime(),
            );
            $this->repositorio->cadastrar($task);
        } catch (Exception $e) {
            throw new Exception('');
        }
    }
    function atualizar()
    {
        try {
            $dados = $_POST;
            $task = new Task(
                0,
                isset($dados['titulo']) ? $dados['titulo'] : '',
                isset($dados['descricao']) ? $dados['descricao'] : '',
                isset($dados['status']) ? $dados['status'] : '',
                new DateTime(),
                new DateTime(),
            );
            $this->repositorio->atualizar($task);
        } catch (Exception $e) {
            throw new Exception('');
        }
    }
    function excluir()
    {
        try {
            $this->repositorio->excluir($_POST['id']);
        } catch (Exception $e) {
            throw new Exception("");
        }
    }
}
