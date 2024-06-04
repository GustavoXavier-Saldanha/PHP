<?php

require_once "RepoProduto.php";
require_once "Produto.php";

class RepoProdutoJson implements RepoProduto
{

    public function salvarProdutos($produtos): void
    {
        $dataJson = json_encode($produtos);
        file_put_contents('produtos.json', $dataJson);
    }

    public function carregarProdutos()
    {
        $dataJson = file_get_contents("produtos.json");
        $dataDecoded = json_decode($dataJson);
        $produtos = [];
        foreach ($dataDecoded as $dd) {
            $produtos[] = new Produto(
                $dd->codigo,
                $dd->descricao,
                $dd->estoque,
                $dd->preco
            );
        }

        return $produtos;
    }
}

$x = new RepoProdutoJson();
$w = $x->carregarProdutos();

foreach ($w as $dd) {
    echo $dd->codigo . " - " . $dd->estoque . PHP_EOL;
}
