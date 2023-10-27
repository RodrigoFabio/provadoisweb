<?php

require "database.php";
require "src/repository/LivroRepository.php";



$livroRepository = new LivroRepository($mysqli);
try {

    $livros = $livroRepository->getAllLivros(); 
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style/index_screen.css">
    <title>Listagem de Livros</title>
</head>
<body>
    <div class="container">
    <h1>Listagem de Livros</h1>
    
    <a class="button" href="cadastrar.php">Adicionar Novo Livro</a>
    <a class="button" href="logout.php">Sair</a>


    <table class="book-table" border="1">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                
                <th>Editora</th>
                <th>Ano de Publicação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>       
    <?php foreach ($livros as $livro): ?>
        <tr>
            <td><p><?= $livro['Titulo'] ?></p></td>
            <td><p><?= $livro['Autor'] ?></p></td>
            <td><p><?= $livro['Editora'] ?></p></td>
            <td><p><?= $livro['AnoPublicacao'] ?></p></td>
            <td><br>

            <form action="detalhes.php" method="post">
                    <input type="hidden" name="id" value="<?= $livro['LivroID']?>">
                    <input type="submit" class="botao-editar" value="Detalhes">
                </form><br>
                <form action="editar.php" method="post">
                    <input type="hidden" name="id" value="<?= $livro['LivroID']?>">
                    <input type="submit" class="botao-editar" value="Editar">
                </form><br>
                <form action="excluir.php" method="post">
                    <input type="hidden" name="id" value="<?= $livro['LivroID']?>">
                    <input type="submit" class="botao-editar" value="Excluir">
                </form><br>

            </td>
        </tr>
    <?php endforeach; ?>
</tbody>

    </table>
    </div>
</body>
</html>
