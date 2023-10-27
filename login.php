<?php
session_start();

if (isset($_GET['erro']) && $_GET['erro'] == 1) {
    echo "<p style='color: red;'>Usuário e/ou senha incorretos. Por favor, tente novamente.</p>";
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style/login_screen.css">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
    <div class="login-form">    
    <h1>Login</h1>

    <form action="processaLogin.php" method="post">
        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br><br>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <br><br>

        <input type="submit" class="button" value="Entrar" ><br><br>
    </form>

    <a href="index.php">Para visualizar os livros disponiveis, clique aqui.</a>

    </div>
</body>
</html>