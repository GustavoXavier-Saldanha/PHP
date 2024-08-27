<?php

namespace acme;

use acme\Fornecedor;

class RepotorioException extends \RuntimeException {};

interface RepositorioFornecedor
{
    function todos(string $filtro = '');
    function cadastrar(Fornecedor $fornecedor);
    function atualizar(Fornecedor $fornecedor);
    function remover(string $idOuCodigo);
}
