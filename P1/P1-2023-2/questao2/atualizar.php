<?php

function atualizarAtleta()
{
    $pdo = null;
    try {
        $pdo = new PDO(
            "mysql:dbname=p1;host=192.168.0.10;charset=utf8",
            "gerente",
            "g3x$t0R",
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
        $codigo = readline("Digite o código: ");
        $ps = $pdo->prepare("SELECT codigo FROM atleta WHERE codigo=:codigo");
        $ps->execute(["codigo" => $codigo]);

        if ($ps->rowCount() == 0) {
            die("O código não existe!");
        }

        $nome = readline("Digite o nome: ");
        if (!isset($nome) || mb_strlen($nome) > 100) {
            die("O nome deve estar preenchido e com o limite de 100 caracteres!");
        }
        $altura = readline("Digite a altura: ");
        if (floatVal($altura) < 0 || floatVal($altura) > 2.99) {
            die("A altura deve ser positiva e com valor de no máximo 2,99 m");
        }
        $peso = readline("Digite o peso: ");
        if (floatVal($peso) < 0 || floatVal($peso) > 299.9) {
            die("O peso deve positivo e tem o valor máximo de 299,9");
        }

        $psMod = $pdo->prepare("UPDATE atleta SET nome=:nome, altura=:altura, peso=:peso where codigo=:codigo");
        $psMod->execute(["nome" => $nome, "altura" => $altura, "peso" => $peso, "codigo" => $codigo]);
        echo "Dados Atualizados!";
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
};

atualizarAtleta();
