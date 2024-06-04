<?php
$pdo = null;

try {
    $pdo = new PDO(
        'mysql:dbname=mma;host=localhost;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

    $ps = $pdo->query('SELECT * FROM lutador');
    $ps->fetchAll();

    $count = 0;
    $altura = 0;
    $mAltura = 0;
    $peso = 0;
    foreach ($ps as $l) {
        $count++;
        if ($peso < $l["peso_em_quilos"]) {
            $peso = $l["peso_em_quilos"];
        }
        if ($mAltura < $l["altura_em_metros"]) {
            $mAltura = $l["altura_em_metros"];
        }

        $altura += $l["altura_em_metros"];

        echo "Nome " . $l["nome"] . " - Peso: " . $l["peso_em_quilos"] . " - Altura " . $l["altura_em_metros"] . PHP_EOL;
    }
    echo "QTD lutadores: " . $count . " Média altura: " . ($altura / $count) . " Maior altura: " . $mAltura . " Maior de Peso: " . $peso;
} catch (Exception $e) {
    die($e->getMessage());
}
