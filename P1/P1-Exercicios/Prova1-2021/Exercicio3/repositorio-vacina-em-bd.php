<?php

namespace vac;

class RepositorioVcinaEmBD implements RepositorioVacina
{

    private $pdo;

    function criarConexao()
    {
        $this->pdo = new PDO(
            'mysql:dbname=2021-1-p1;host=localhost;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
};
