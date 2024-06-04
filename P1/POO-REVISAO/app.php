<?php

const OPCAO_SAIR = '0';
const OPCAO_LISTAR = '1';
const OPCAO_CADASTRAR = '2';
const OPCAO_REMOVER = '3';

$contatos = [];
do {
    echo 'Menu:', PHP_EOL;

    echo '0) Sair', PHP_EOL;
    echo '1) Listar', PHP_EOL;
    echo '2) Cadastrar', PHP_EOL;
    echo '3) Remover', PHP_EOL;

    $opcao = readline('Opção: ');
    switch ($opcao) {
        case OPCAO_SAIR:
            break;
        case OPCAO_LISTAR:
            listar();
            break;
        case OPCAO_CADASTRAR:
            cadastrar();
            break;
        case OPCAO_REMOVER:
            remover();
            break;
        default:
            echo 'Opção inválida.', PHP_EOL;
    }
} while ($opcao != OPCAO_SAIR);

function cadastrar()
{
    echo 'Cadastro', PHP_EOL;

    $nome = readline('Nome: ');
    $arrTel = [];
    do {
        $telefone = readline('Telefone: ');
        $telClass = new Telefone($telefone);
        $arrTel[] = $telClass;
    } while ($telefone);

    $problemas = validarDadosContato($nome, $telefone);
    if (count($problemas) > 0) {
        echo implode(PHP_EOL, $problemas);
        // Idem foreach ( $problemas as $p ) echo $p, PHP_EOL;
    } else {
        $contato = ['nome' => $nome, 'telefone' => $telefone];
        $contatos[] = $contato; // array_push( $contatos, $contato );
    }
}

function listar($contatos)
{
    echo 'Listagem', PHP_EOL;
    $arrClientes = [];
    foreach ($contatos as $indice => $c) {
        echo $indice + 1, ') ', $c['nome'], ' - ', $c['telefone'], PHP_EOL;
    }
}

function remover(&$contatos)
{
    echo 'Remoção', PHP_EOL;

    $posicao = solicitarPosicao($contatos);
    if ($posicao >= 0) {
        unset($contatos[$posicao]);
        echo 'Removido.', PHP_EOL;
    } else {
        echo 'Posição inválida.', PHP_EOL;
    }
}

function conectar()
{
    $pdo = null;
    try {

        return $pdo = new Pdo(
            'mysql;dbname=execiciopoo;host=localhost;charset=utf8',
            'root',
            '',
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    } catch (RepositorioException $e) {
        die("Erro: " . $e->getMessage());
    }
}
