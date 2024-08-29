<?php

function conexao()
{
    try {
        $pdo = new PDO(
            'mysql:dbname=task_maneger;host=loalhost;charset=utf8',
            'task_user',
            'task_password',
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC

            ]
        );
        return $pdo;
    } catch (PDOException $e) {
        die("Erro: " . $e->getMessage());
    }
}
