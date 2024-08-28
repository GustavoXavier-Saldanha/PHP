<?php

function conexao()
{
    try {
        $pdo = new PDO(
            'mysql:dbname=task_maneger;host=loalhost;charset=utf8',
            'task_user',
            'task_password',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
        return $pdo;
    } catch (PDOException $e) {
        throw new PDOException("Erro: " . $e->getMessage());
    }
}
