<?php
require "database.php";
require "src/repository/LivroRepository.php";
$livroRepository = new LivroRepository($mysqli);
$livro = $livroRepository->BuscaLivroById($_POST['id']);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Livro</title>
</head>
<body>
    <h1>Detalhes do Livro</h1>
    
    <a href="index.php">Voltar</a>
    <?php if ($livro) : ?>
        <table border="1">
            <tr>
                <th>LivroID</th>
                <td><?= $livro["LivroID"] ?></td>
            </tr>
            <tr>
                <th>Título</th>
                <td><?= $livro["Titulo"] ?></td>
            </tr>
            <tr>
                <th>Autor</th>
                <td><?= $livro["Autor"] ?></td>
            </tr>
            <tr>
                <th>Ano de Publicação</th>
                <td><?= $livro["AnoPublicacao"] ?></td>
            </tr>
            <tr>
                <th>Editora</th>
                <td><?= $livro["Editora"] ?></td>
            </tr>
            <tr>
                <th>GeneroId</th>
                <td><?= $livro["GeneroId"] ?></td>
            </tr>
            <tr>
                <th>Data de Cadastro</th>
                <td><?= $livro["DataCadastro"] ?></td>
            </tr>
            <tr>
                <th>Disponível</th>
                <td><?= $livro["Disponivel"] ?></td>
            </tr>
        </table>
    <?php else : ?>
        <p>O livro não foi encontrado.</p>
    <?php endif; ?>
</body>
</html>
