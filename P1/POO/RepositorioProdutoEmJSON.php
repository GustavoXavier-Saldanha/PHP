<?php
require_once 'RepositorioProduto.php';
class RepositorioProdutoEmJSON implements RepositorioProduto {

    private $arquivo;

    public function __construct( $arquivo ) {
        $this->arquivo = $arquivo;
    }

    function salvar( $produtos ) {
        $json = json_encode( $produtos ); // string
        file_put_contents( $this->arquivo, $json );
    }

    function carregar() {
        $json = file_get_contents( $this->arquivo );
        // ATENÇÃO: Não são do tipo Produto, mas stdClass
        $objetos = json_decode( $json );
        // Convertendo para produtos
        $produtos = [];
        foreach ( $objetos as $o ) {
            $produtos []= new Produto(
                $o->codigo, $o->descricao, $o->estoque, $o->preco );
        }
        return $produtos;
    }
}

// require_once 'Produto.php';
// $produtos = [
//     new Produto( '123456', 'Coca-cola', 10, 6.50 ),
//     new Produto( '654321', 'Guaraná Friburgo', 20, 6.00 ),
// ];

// $repositorio = new RepositorioProdutoEmJSON( 'produtos.json' );
// $repositorio->salvar( $produtos );