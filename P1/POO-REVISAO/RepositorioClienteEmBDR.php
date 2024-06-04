<?php
interface RepositorioCliente
{
    /**
     * @param  Cliente $cliente
     */
    public function adicionar($cliente);

    /**
     * @param int $id
     */
    public function removerPeloId($id);

    /**
     * @return array<Cliente>
     */
    public function todos();
}
