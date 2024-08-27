<?php

namespace acme;

use PDO;
use PDOException;

class RepositorioEmBDR implements RepositorioFornecedor
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function todos(string $filtro = '')
    {
        try {
            $sql = <<<'SQL'
            SELECT * FROM fornecedores  WHERE codigo LIKE '%$filtro%' OR nome LIKE ' % $filtro % 'OR cnpj LIKE ' % $filtro % ' OR email LIKE ' % $filtro %'
        SQL;

            $ps = $this->pdo->prepare($sql);
            $ps->execute();

            $todosOsFornecedores = $ps->fetchAll();
            return json_encode($todosOsFornecedores);
        } catch (PDOException $e) {
            throw new PDOException('Erro ao buscar fornecedores: ' . $e->getMessage());
        }
    }

    public function cadastrar(Fornecedor $fornecedor): void
    {
        try {
            $validation = $this->validar($fornecedor);
            if ($validation) {
                foreach ($validation as $error) {
                    echo $error;
                }
                die;
            }

            $stmt = $this->pdo->prepare('INSERT INTO fornecedores (codigo, nome, email, cnpj, telefone) VALUES (:codigo, :nome, :email, :cnpj, :telefone)');
            $stmt->execute([
                ':codigo' => $fornecedor->codigo,
                ':nome' => $fornecedor->nome,
                ':email' => $fornecedor->email,
                ':cnpj' => $fornecedor->cnpj,
                ':telefone' => $fornecedor->telefone
            ]);
            $fornecedor->id = $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new PDOException('Erro ao adicionar fornecedor: ' . $e->getMessage());
        }
    }

    public function atualizar(Fornecedor $fornecedor): void
    {
        try {
            $validation = $this->validar($fornecedor);
            if ($validation) {
                foreach ($validation as $error) {
                    echo $error;
                }
                die;
            }

            $stmt = $this->pdo->prepare('UPDATE fornecedores SET codigo = :codigo, nome = :nome, email = :email, cnpj = :cnpj, telefone = :telefone WHERE id = :id');
            $stmt->execute([
                ':codigo' => $fornecedor->codigo,
                ':nome' => $fornecedor->nome,
                ':email' => $fornecedor->email,
                ':cnpj' => $fornecedor->cnpj,
                ':telefone' => $fornecedor->telefone,
                ':id' => $fornecedor->id
            ]);
        } catch (PDOException $e) {
            throw new PDOException('Erro ao atualizar fornecedor: ' . $e->getMessage());
        }
    }

    public function remover(string $idOuCodigo)
    {
        try {
            $stmt = $this->pdo->prepare('DELETE FROM fornecedores WHERE id = :id');
            $stmt->execute([':id' => $idOuCodigo]);
        } catch (PDOException $e) {
            throw new PDOException('Erro ao remover fornecedor: ' . $e->getMessage());
        }
    }

    private function validar(Fornecedor $fornecedor): array
    {
        $erros = [];
        if (!is_numeric($fornecedor->codigo) || $fornecedor->codigo < 0) {
            $erros[] = 'O código deve ser um número não negativo.';
        }
        if (mb_strlen($fornecedor->nome) > 60 || mb_strlen($fornecedor->nome) < 4) {
            $erros[] = 'O nome deve ter mais de 4 caracteres e deve ter menos de 60.';
        }
        if (strpos($fornecedor->email, ".com") === false || strpos($fornecedor->email, '@') === false) {
            $error[] = 'O email deve ser válido.';
        }
        if (mb_strlen($fornecedor->cnpj) !== 14 || !is_numeric($fornecedor->cnpj)) {
            $error[] = 'O CNPJ deve ser válido.';
        }
        if (!is_numeric($fornecedor->telefone)) {
            $erros[] = 'O telefone deve ser válido.';
        }

        return $erros;
    }
}
