<?php
require_once("src/conexao.php");

use acme\Fornecedor;

require_once("src/Fornecedor.php");
require_once("src/RepositorioEmBDR.php");

$repositorio = new RepositorioEmBDR(conectar());

$metodo = $_SERVER['REQUEST_METHOD'];
$url = mb_strtolower($_SERVER['REQUEST_URI']);

switch ($metodo) {
    case 'GET':
        if ($url === '/fornecedores') {
            $cabecalhos = getallheaders();
            $filtro = isset( $cabecalhos[ 'filtro' ] ) ? $cabecalhos[ 'filtro' ] : '';

            $todos = $repositorio->todos($filtro);
            header('Content-Type: application/json');
            echo json_encode($todos);
        }
        break;

    case 'POST':
        if ($url === '/fornecedores') {
            $conteudo = file_get_contents( 'php://input' );
            $dados = [];
            mb_parse_str( $conteudo, $dados );
            $fornecedor = new Fornecedor(
                0,
                isset($dados['codigo']) ? $dados['codigo'] : '',
                isset($dados['nome']) ? $dados['nome'] : '',
                isset($dados['email']) ? $dados['email'] : '',
                isset($dados['cnpj']) ? $dados['cnpj'] : '',
                isset($dados['telefone']) ? $dados['telefone'] : '',
             );
    
            $repositorio->cadastrar($fornecedor);
            http_response_code(201);
            echo 'Cadastrado';
        }
        break;

    case 'PUT':
        if ($url === '/fornecedores') {
            $conteudo = file_get_contents( 'php://input' );
            $dados = [];
            mb_parse_str( $conteudo, $dados );
            $fornecedor = new Fornecedor(
                0,
                isset($dados['codigo']) ? $dados['codigo'] : '',
                isset($dados['nome']) ? $dados['nome'] : '',
                isset($dados['email']) ? $dados['email'] : '',
                isset($dados['cnpj']) ? $dados['cnpj'] : '',
                isset($dados['telefone']) ? $dados['telefone'] : '',
             );
    
            $repositorio->cadastrar($fornecedor);
            http_response_code(201);
            echo 'Atualizado';
        }
        break;

    case 'DELETE':
        if ($url === '/fornecedores') {
            $controlador->remover();
        }
        break;

    default:
        http_response_code(404);
        echo json_encode(['erro' => 'Recurso não encontrado']);
}
