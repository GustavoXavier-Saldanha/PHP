<?php

class RepositorioClienteEmBDR implements RepositorioCliente
{
    private $pdo = null;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function adicionar(&$cliente)
    {
        try {

            $this->pdo->beginTransaction();
            $ps = $this->pdo->prepare("INSERT INTO cliente (nome) VALUES (:nome)");
            $ps->execute([$cliente->nome]);
            $cliente->id = $this->pdo->lastInsertId();

            $ps = $this->pdo->prepare("INSERT INTO cliente_telefone (cliente_id, numero) VALUES (:id, :numero)");
            foreach ($cliente->telefone as $tel) {
                $ps->execute(["nome:" => $cliente->id, "numero" => $tel]);
            }
            $this->pdo->commit();
        } catch (RepositorioException $e) {
            if ($this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }
            die("Erro: " . $e->getMessage());
        }
    }

    public function removerPeloId($id)
    {
        try {
            $ps = $this->pdo->prepare("DELETE FROM cliente WHERE id=:id");
            $ps->execute(["id" => $id]);
        } catch (RepositorioException $e) {
            die("Erro: " . $e->getMessage());
        }
    }

    public function todos()
    {
        try {
            $ps = $this->pdo->query("SELECT * FROM clientes");

            return $ps->fetchAll();;
        } catch (RepositorioException $e) {
            die("Erro: " . $e->getMessage());
        }
    }
}
