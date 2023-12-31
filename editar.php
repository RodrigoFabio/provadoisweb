<?php

require "database.php";
require "src/repository/LivroRepository.php";
session_start();
if (isset($_SESSION["usuario"])) {   
    $livroRepository = new LivroRepository($mysqli);
    
    if (isset($_POST['id'])) {
        
        $id = $_POST['id'];
          
        $livro = $livroRepository->BuscaLivroById(intval($id));

    }
    

    if (isset($_POST['editar'])) {
        $LivroID = intval($_POST['LivroID']); // Converta para inteiro
        $novaDataCadastro = new DateTime($_POST['DataCadastro']);
        $livroRepository->editarLivro(
            $LivroID, 
            $_POST['titulo'],
            $_POST['autor'],
            $_POST['anoPublicacao'],
            $_POST['editora'],
            $_POST['genero'],
            $novaDataCadastro,
            $_POST['disponivel']
        );
        header("Location: index.php");
    }
    
}else{
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style/editar_screen.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h1 id="titulo" >Editar Informações do Livro</h1>
    <form method="post" >
        <input type="hidden" name="LivroID" value="<?= $livro["LivroID"] ?>">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="<?= $livro["Titulo"] ?>" required><br><br>

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" value="<?= $livro["Autor"] ?>"><br><br>

        <label for="anoPublicacao">Ano de Publicação:</label>
        <input type="text" id="anoPublicacao" name="anoPublicacao" value="<?= $livro["AnoPublicacao"] ?>"><br><br>

        <label for="editora">Editora:</label>
        <input type="text" id="editora" name="editora" value="<?= $livro["Editora"] ?>"><br><br>

        <label for="genero">Gênero Literário:</label>
        <select id="genero" name="genero">
            <option value="1" <?php if ($livro["GeneroId"] == 1) echo "selected"; ?>>Ficção</option>
            <option value="2" <?php if ($livro["GeneroId"] == 2) echo "selected"; ?>>Acadêmico</option>
            <option value="3" <?php if ($livro["GeneroId"] == 3) echo "selected"; ?>>Romance</option>
            <option value="4" <?php if ($livro["GeneroId"] == 4) echo "selected"; ?>>Mistério</option>
            <option value="5" <?php if ($livro["GeneroId"] == 5) echo "selected"; ?>>Fantasia</option>
        </select><br><br>

        <label for="dataCadastro">Data de Cadastro:</label>
        <input type="date" id="dataCadastro" name="dataCadastro" value="<?= $livro["DataCadastro"] ?>" required><br><br>

        <label for="disponivel">Disponível:</label>
        <input type="text" id="disponivel" name="disponivel" value="<?= $livro["Disponivel"] ?>"><br><br>
        
        <input type="submit" class="button" name="editar" value="Salvar Alterações">
        <a class="button" href="index.php"> Voltar</a>

    </form>

    </div>
</body>
</html>