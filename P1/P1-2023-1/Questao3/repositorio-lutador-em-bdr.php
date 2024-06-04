<?php

namespace Mma;

require_once 'repositorio-lutador.php';
require_once 'lutador.php';

use Lutador;
use PDO;
use PDOException;

class RepoEmBdr implements RepositorioLutador
{

    function connect()
    {
        try {
            $pdo = new PDO(
                // 'mysql:dbname=mma;host=localhost;charset=utf8',
                // 'dev',
                // '123456',
                'mysql:dbname=teste;host=localhost;charset=utf8',
                'root',
                getenv("bd_pass"),
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $e) {
            die('Erro: ' . $e->getMessage());
        }

        return $pdo;
    }

    public function adicionarLutador(\Lutador $lutador)
    {
        try {
            $pdo = $this->connect();
            $ps = $pdo->prepare('INSERT INTO lutador (id, nome, peso_em_quilos, altura_em_metros) VALUES (?, ?, ?, ?)');
            $ps->execute([
                $lutador->id,
                $lutador->nome,
                $lutador->pesoEmQuilos,
                $lutador->alturaEmMetros,
            ]);
        } catch (PDOException $e) {
            die('Erro: ' . $e->getMessage());
        }
    }

    public function removerLutador($id)
    {
        try {
            $pdo = $this->connect();
            $ps = $pdo->prepare('DELETE FROM lutador WHERE id=?');
            $ps->execute([$id]);
        } catch (PDOException $e) {
            die('Erro: ' . $e->getMessage());
        }
    }
}

$test = new RepoEmBdr();
$lutador = new Lutador(5, 'Gustavo', '70.00', '1.75');
$test->adicionarLutador($lutador);
