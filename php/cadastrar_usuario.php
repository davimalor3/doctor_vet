<?php
include 'db_config.php';

// Verificar se formulario foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // criptografa a senha
    $telefone = $_POST['telefone'];

    $sql = "INSERT INTO usuarios (nome, email, senha, telefone) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nome, $email, $senha, $telefone);

    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!"; //TODO: mensagem como alert()
        //TODO: redirecionar para pagina de login: header("Location: ../login.html");
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
