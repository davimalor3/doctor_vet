<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h1>Pagina de Cadastro</h1>

    <form action="php/cadastrar_usuario.php" method="POST">
    <span>Nome</span>
    <input type="text" name="nome" placeholder="Nome" required><br>
    <span>E-mail</span>
    <input type="email" name="email" placeholder="E-mail" required><br>
    <span>Senha</span>
    <input type="password" name="senha" placeholder="Senha" required><br>
    <span>Telefone</span>
    <input type="text" name="telefone" placeholder="Telefone"><br>
    <button type="submit">Cadastrar</button>
    </form>


</body>
</html>