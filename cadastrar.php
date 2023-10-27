
<?php
    require "database.php";
    require "src/repository/LivroRepository.php";
    
    $livroRepository = new LivroRepository($mysqli);
    
    if(isset($_POST['cadastrar'])){
        $novaDataCadastro = new DateTime($_POST['dataCadastro']);
        $livroRepository->salvarLivro(
            $_POST['titulo'],
            $_POST['autor'],
            $_POST['anoPublicacao'],
            $_POST['editora'],
            $_POST['genero'],
            $novaDataCadastro,  // Use $novaDataCadastro aqui
            $_POST['disponivel']
        );
    }
    
        
             
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style/cadastrar_screen.css">
    <title>Cadastrar Novo Livro</title>
</head>
<body>
    <div class="container">
    <h1>Cadastrar Novo Livro</h1>

    <form method="post">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor"><br><br>

        <label for="anoPublicacao">Ano de Publicação:</label>
        <input type="text" id="anoPublicacao" name="anoPublicacao"><br><br>

        <label for="editora">Editora:</label>
        <input type="text" id="editora" name="editora"><br><br>

        <label for="genero">Gênero Literário:</label>
        <select id="genero" name="genero">
            <option value="1">Ficção</option>
            <option value="2">Acadêmico</option>
            <option value="3">Romance</option>
            <option value="4">Mistério</option>
            <option value="5">Fantasia</option>
        </select><br><br>

        <label for="dataCadastro">Data de Cadastro:</label>
        <input type="date" id="dataCadastro" name="dataCadastro" placeholder="AAAA-MM-DD"><br><br>

        <label for="disponivel">Disponível:</label>
        <input type="text" id="disponivel" name="disponivel"><br><br>

        <input name="cadastrar" class="button" type="submit" value="Cadastrar">

        <a class="button" href="index.php">Voltar</a>

    </form>
    </div>
</body>
</html>
