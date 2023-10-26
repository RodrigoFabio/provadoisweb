<?php
session_start();
require('database.php');
require "src/repository/LivroRepository.php";

if (empty($_POST) || empty($_POST["usuario"]) || empty($_POST["senha"])) {
    header("Location: login.php");
    exit;
}

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
$livroRepository = new LivroRepository($mysqli);

if ($livroRepository->validaUser($usuario, $senha)) {
    $_SESSION["usuario"] = $usuario;
    $_SESSION["senha"] = $senha;
    echo "teste";
    header("Location: index.php"); // Redirecionar para a página principal após login
    exit;
} else {
    header("Location: login.php?erro=1");
    exit;
}
?>
