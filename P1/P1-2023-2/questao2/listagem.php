<?php

function listAll()
{
    $pdo = null;

    try {
        $pdo = new PDO(
            "mysql:dbname=p1;host=localhost;charset=utf8",
            "root",
            "",
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );

        $ps = $pdo->query("SELECT codigo, nome, peso, altura FROM atleta ORDER BY nome");
        $data = $ps->fetchAll();

        $psMed = $pdo->query("SELECT AVG(peso) as media_peso, MAX(altura) as altura_max FROM atleta");
        $dataMed = $psMed->fetch();

        foreach ($data as $p) {
            echo
            $p["codigo"] . " - " .
                $p["nome"] . " possui " . str_replace('.', ',', $p["peso"]) .
                " Kg e mede " . str_replace('.', ',', $p["altura"]) . PHP_EOL;
        }

        echo "Peso médio: " . str_replace(".", ",", $dataMed["media_peso"]) .
            " Altura Máxima: " . str_replace(".", ",", $dataMed["altura_max"]), PHP_EOL;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

listAll();
