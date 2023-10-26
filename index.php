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
    <title>Listagem de Livros</title>
</head>
<body>
    <h1>Listagem de Livros</h1>
    
    <a href="cadastrar.php">Adicionar Novo Livro</a>
    <a href="logout.php">SAIR</a>

    <table border="1">
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
            <td>

            <form action="detalhes.php" method="post">
                    <input type="hidden" name="id" value="<?= $livro['LivroID']?>">
                    <input type="submit" class="botao-editar" value="Detalhes">
                </form>
                <form action="editar.php" method="post">
                    <input type="hidden" name="id" value="<?= $livro['LivroID']?>">
                    <input type="submit" class="botao-editar" value="Editar">
                </form>
                <form action="excluir.php" method="post">
                    <input type="hidden" name="id" value="<?= $livro['LivroID']?>">
                    <input type="submit" class="botao-editar" value="Excluiiiiiiir">
                </form>

            </td>
        </tr>
    <?php endforeach; ?>
</tbody>

    </table>
</body>
</html>