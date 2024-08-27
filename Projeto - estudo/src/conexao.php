<?php

function conectar()
{
    $pdo = new PDO(
        'mysql:dbName=acme;host=mysql.acme.com;charset=utf8',
        "gerente",
        "g3ReNT&",
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]
    );
    return $pdo;
}


// function validar(): array
// {
//     $erros = [];
//     if (!is_numeric($this->codigo) || $this->codigo < 0) {
//         $erros[] = 'O código deve ser um número não negativo.';
//     }
//     if (mb_strlen($this->nome) > 60 || mb_strlen($this->nome) < 4) {
//         $erros[] = 'O nome deve ter mais de 4 caracteres e deve ter menos de 60.';
//     }
//     if (strpos($this->email, ".com") === false || strpos($this->email, '@') === false) {
//         $error[] = 'O email deve ser válido.';
//     }
//     if (mb_strlen($this->cnpj) !== 14 || !is_numeric($this->cnpj)) {
//         $error[] = 'O CNPJ deve ser válido.';
//     }
//     if (!is_numeric($this->telefone)) {
//         $erros[] = 'O telefone deve ser válido.';
//     }

//     return $erros;
// }