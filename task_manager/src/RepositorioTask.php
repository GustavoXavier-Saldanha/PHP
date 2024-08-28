<?php

require_once 'Task.php';

interface RepositorioTask 
{
    function buscarTodos();
    function cadastrar(Task $task);
    function atualizar(Task $task);
    function remover($id);
}
