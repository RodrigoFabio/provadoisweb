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
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <a href="index.php">LISTAGEM</a>
    <form action="processaLogin.php" method="post">
        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br><br>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <br><br>
        
        <input type="submit" value="Entrar">
    </form>
</body>
</html>
