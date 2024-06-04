<?php


$bdr = new RepoEmBdr();
$pdo = $bdr->connect();

$id1 = readline();
$id2 = readline();

try {
    $pdo->beginTransaction();
    $bdr->removerLutador($id1);
    $bdr->removerLutador($id2);
    $pdo->commit();
} catch (PDOException $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollback();
    };
    die("Erro: " . $e->getMessage());
};
