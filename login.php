<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>

    <form action="php/login_usuario.php" method="POST">
        <span>E-mail</span>
        <input type="email" name="email" placeholder="E-mail" required><br>
        <span>Senha</span>
        <input type="password" name="senha" placeholder="Senha" required><br>
        <button type="submit">Entrar</button>
    </form>
</body>

</html>