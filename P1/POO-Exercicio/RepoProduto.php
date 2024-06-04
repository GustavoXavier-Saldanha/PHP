<?php

interface RepoProduto
{
    /**
     *  @param array<Produto> $produtos
     */
    function salvarProdutos($produtos): void;

    /**
     * @return array<Produto>
     */
    function carregarProdutos();
}
