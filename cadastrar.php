
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
            $novaDataCadastro, 
            $_POST['disponivel']
        );
    }
    
        
             
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Novo Livro</title>
</head>
<body>
    <a href="index.php">voltar   </a>
    <h1>Cadastrar Novo Livro</h1>

    <form method="post">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required>

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor">

        <label for="anoPublicacao">Ano de Publicação:</label>
        <input type="text" id="anoPublicacao" name="anoPublicacao">

        <label for="editora">Editora:</label>
        <input type="text" id="editora" name="editora">

        <label for="genero">Gênero Literário:</label>
        <select id="genero" name="genero">
            <option value="1">Ficção</option>
            <option value="2">Acadêmico</option>
            <option value="3">Romance</option>
            <option value="4">Mistério</option>
            <option value="5">Fantasia</option>
        </select>

        <label for="dataCadastro">Data de Cadastro:</label>
        <input type="date" id="dataCadastro" name="dataCadastro" placeholder="AAAA-MM-DD">

        <label for="disponivel">Disponível:</label>
        <input type="text" id="disponivel" name="disponivel"><br>

        <input name="cadastrar" type="submit" value="Cadastrar">
    </form>
</body>
</html>
