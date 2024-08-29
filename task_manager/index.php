<?php
require_once("src/conexao.php");

use acme\Fornecedor;

require_once("src/Fornecedor.php");
require_once("src/controladoraEmBDR.php");

$controladora = new ControladoraTask(conectar());

$metodo = $_SERVER['REQUEST_METHOD'];
$url = mb_strtolower($_SERVER['REQUEST_URI']);

switch ($metodo) {
    case 'GET':
        if ($url === '/task') {
            $todos = $controladora->obterTodos();
            header('Content-Type: application/json');
            echo json_encode($todos);
        }
        break;

    case 'POST':
        if ($url === '/task') {
            $dados = $_POST;
            $task = new Task(
                0,
                isset($dados['titulo']) ? $dados['titulo'] : '',
                isset($dados['descricao']) ? $dados['descricao'] : '',
                isset($dados['status']) ? $dados['status'] : '',
                new DateTime(),
                new DateTime(),
            );

            $controladora->cadastrar($task);
            http_response_code(201);
            echo 'Cadastrado';
        }
        break;

    case 'PUT':
        if ($url === '/task') {
            $dados = $_POST;
            $task = new Task(
                0,
                isset($dados['titulo']) ? $dados['titulo'] : '',
                isset($dados['descricao']) ? $dados['descricao'] : '',
                isset($dados['status']) ? $dados['status'] : '',
                new DateTime(),
                new DateTime(),
            );

            $controladora->atualizar($task);
            http_response_code(201);
            echo 'Atualizado';
        }
        break;

    case 'DELETE':
        if ($url === '/task') {
            $controladora->excluir($_POST['id']);
        }
        break;

    default:
        http_response_code(404);
        echo json_encode(['erro' => 'Recurso não encontrado']);
}
