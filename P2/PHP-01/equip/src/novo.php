<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Equipamentos</h1>
    <form action="cadastrar.php" method="post">
        <div>
            <label for="id">ID:</label>
            <input type="number" id="id" name="id" required>
        </div>
        <div>
            <label for="codigo">Código:</label>
            <input type="text" id="codigo" name="codigo" required>
        </div>
        <div>
            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" required>
        </div>
        <div>
            <label for="situacao">Situação:</label>
            <select id="situacao" name="situacao" required>
                <option value="U" select>Em uso</option>
                <option value="E">Em uso</option>
                <option value="D">Embalado</option>
            </select>
        </div>
        <div>
            <label for="cadastro">Data de Cadastro:</label>
            <input type="date" id="cadastro" name="cadastro" required>
        </div>
        <div>
            <label for="categoria">Categoria:</label>
            <select id="categoria" name="categoria" required>
                <?php
                // geraraCategorias()
                ?>
            </select>
        </div>
        <div>
            <button type="submit">Enviar</button>
        </div>
    </form>
</body>

</html>