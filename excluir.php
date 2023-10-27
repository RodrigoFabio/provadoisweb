<?php

require "database.php";
require "src/repository/LivroRepository.php";

session_start();
//se existir session, exclui, senao, redireciona
if (isset($_SESSION["usuario"])) {
    $livroRepository = new LivroRepository($mysqli);
    $livroRepository->deletarLivro($_POST['id']);
    header("Location: index.php");
} else {

    header("Location: cadastar.php");
    exit;
}


?>
