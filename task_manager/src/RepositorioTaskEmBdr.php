<?php

require_once 'conexao.php';
require_once 'Task.php';

class RepositorioTaskEmBdr implements RepositorioTask // MODEL
{

    private $pdo;

    function __construct()
    {
        $this->pdo = conexao();
    }

    public function buscarTodos()
    {
        try {
            $sql = <<<'SQL'
                SELECT * FROM task
            SQL;

            $ps = $this->pdo->prepare($sql);
            $ps->execute();
            return $ps->fetchAll();
        } catch (PDOException $e) {
            throw new PDOException('Erro:' . $e);
        }
    }

    public function cadastrar(Task $task)
    {
        try {
            $sql = <<<'SQL'
            INSERT INTO task (titulo, descricao, status, dataAtualizacao)
            VALUES
            (:title, :description, :status, :dataAtualizacao)
        SQL;

            $ps = $this->pdo->prepare($sql);
            $ps->execute([
                'title' => $task->titulo,
                'description' => $task->descricao,
                'status' => $task->status,
                'dataAtualizacao' => $task->dataAtualizacao
            ]);
            $task->id = intval($this->pdo->lastInsertId());
        } catch (PDOException $e) {
            throw new PDOException('Erro: ' . $e);
        }
    }

    public function atualizar(Task $task)
    {
        try {
            $sql = <<<'SQL'
            UPDATE task SET title = :titulo, desecription = :descricao, updated_at = :dataAtualizacao WHERE id=:id
            SQL;
            $ps = $this->pdo->prepare($sql);
            $ps->execute([
                'titulo' => $task->titulo,
                'descricao' => $task->descricao,
                'dataAtualizacao' => $task->dataAtualizacao,
                'id' => $task->id
            ]);
        } catch (PDOException $e) {
            throw new PDOException('Erro: ' . $e);
        }
    }

    public function remover($id)
    {
        try {
            $sql = <<<'SQL'
                DELETE FROM task WHERE id = :id
            SQL;
            $ps = $this->pdo->prepare($sql);
            $ps->execute([
                'id' => $id
            ]);
        } catch (PDOException $e) {
            throw new PDOException('Erro: ' . $e);
        }
    }
}
