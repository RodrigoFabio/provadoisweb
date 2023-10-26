<?php
session_start(); // Inicia a sessão

if (isset($_SESSION['usuario'])) {
    // Remove todas as variáveis de sessão
    session_unset();

    // Destroi a sessão
    session_destroy();

    // Redireciona para a página de login ou qualquer outra página desejada
    header("Location: login.php");
    exit;
} else {
    // Se o usuário não estiver autenticado, apenas redirecione para a página de login
    header("Location: login.php");
    exit;
}
?>
