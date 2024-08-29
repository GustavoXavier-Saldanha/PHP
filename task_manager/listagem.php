<?php

function listagemTask(){

    $data = ;
    $comp =<<<'HTML'
        <tr>
            <td></td>

    HTML;

    return $comp;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
</head>
<body>
    <h1>Task</h1>
    <a href="cadastro.php" >Novo</a>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Status</th>
                <th>Data Cadastro</th>
                <th>Data Edição</th>
            </tr>
        </thead>
        <tbody>
        <?php
            listagemTask();
        ?>
        </tbody>
    </table>
</body>
</html>
