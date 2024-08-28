<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastro</h1>
    <form action="http://localhost:8080/task" method="POST" >
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" >
        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" >
        <button type="submit">Salvar</button>
    </form>
</body>
</html>