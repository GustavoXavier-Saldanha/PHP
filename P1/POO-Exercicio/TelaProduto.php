<?php

require_once "Produto.php";
class TelaProduto
{
    public function menu()
    {
        $prod = [];

        do {
            echo "0) sair" . PHP_EOL;
            echo "1) Listar" . PHP_EOL;
            echo "2) Cadastrar" . PHP_EOL;
            $option = readline();
            switch ($option) {
                case '1':
                    $this->mostrarProdutos($prod);
                    break;
                case '2':
                    $prod[] = $this->obterProduto();
                    break;
                case "0":
                    die("Aplicação finalizada!");
                    break;
                default:
                    die("Aplicação finalizada!");
                    break;
            }
        } while ($option !== "0");
    }

    public function obterProduto()
    {
        $codigo = readline("Digite o código: ");
        $descricao = readline("Digite a descricao: ");
        $estoque = readline("Digite o estoque: ");
        $preco = readline("Digite o preço: ");

        $produtos = new Produto($codigo, $descricao, intval($estoque), floatval($preco));

        return $produtos;
    }

    public function mostrarProdutos($produtos)
    {
        if (!isset($produtos) || count($produtos) === 0) {
            echo PHP_EOL . "Nenhum Produto Existente" . PHP_EOL . PHP_EOL;
        } else {
            foreach ($produtos as $p) {
                echo $p->codigo . " - Descrição: " . $p->descricao
                    . " - Estoque: " . $p->estoque . " - Preco: " .
                    $p->preco . PHP_EOL;
            }
        }
    }
}

$x = new TelaProduto();
$x->menu();
