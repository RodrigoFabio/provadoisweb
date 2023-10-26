<?php
//require "processaLogin.php";
require "database.php";
require "src/repository/LivroRepository.php";

session_start();

if (isset($_SESSION["usuario"])) {
    echo "A sessão 'usuario' está definida. no excluir ";
    $livroRepository = new LivroRepository($mysqli);
    $livroRepository->deletarLivro($_POST['id']);
    header("Location: index.php");
} else {
    echo "A sessão 'usuario' NÃO está definida.";

    header("Location: cadastar.php");
    exit;
}


?>
