<?php
require_once("src/conexao.php");
require_once("src/controladoraEmBDR.php");

$controladora = new ControladoraTask();

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
    
            $controladora->cadastrar();
            http_response_code(201);
            echo 'Cadastrado';
        }
        break;

    case 'PUT':
        if ($url === '/task') {
            $controladora->atualizar();
            http_response_code(201);
            echo 'Atualizado';
        }
        break;

    case 'DELETE':
        if ($url === '/task') {
            $controladora->excluir();
        }
        break;

    default:
        http_response_code(404);
        echo json_encode(['erro' => 'Recurso não encontrado']);
}
