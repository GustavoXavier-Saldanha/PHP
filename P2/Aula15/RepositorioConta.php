<?php

require_once 'RepositorioConta.php';
require_once 'Conta.php';

class RepositorioConta
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function adicionar(Conta $c): void
    {
        $sql = <<<'SQL'
        INSERT INTO conta (descricao, valor)
        VALUES(:descricao, :valor)
        SQL;
        $ps = $this->pdo->prepare($sql);
        $ps->execute(['descricao' => $c->descricao, 'valor' => $c->valor]);
        $c->id = intval($this->pdo->lastInsertId());
    }
}
