<?php
require_once __DIR__ . '/../config/session_config.php';
require_once __DIR__ . '/../config/db_config.php';
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitização simples -> TODO: melhorar a segurança de sanitização, validando entradas do usuário
    $nome     = trim($_POST['nome']);
    $email    = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $senha    = trim($_POST['senha']);

    // validação de campos preenchgdos
    if (empty($nome) || empty($email) || empty($senha)) {
        $_SESSION['error'] = "Preencha todos os campos obrigatórios.";
        header("Location: ../cadastro.php");
        exit;
    }
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    $userModel = new User($pdo);

    // verifica se o e-mail já foi usado
    $existing = $userModel->findByEmail($email);
    if ($existing) {
        $_SESSION['error'] = "E-mail já cadastrado! Tente outro.";
        header("Location: ../cadastro.php");
        exit;
    }
    // verificação simples de senha -> TODO: melhorar padrão de senha para evitar bruteforce, mesmo ja sendo validado em login
    if ($senha < 6) {
        $_SESSION['error'] = "Senha deve ser maior que 6 dígitos!";
        header("Location: ../cadastro.php");
        exit;
    }

    // armazena  o usuário no banco
    $userId = $userModel->create($nome, $email, $telefone, $senhaHash);

    // faz login e redireciona para a pagina de dashboard
    login_user($userId, $nome, $email);
    header("Location: ../dashboard.php");
    exit;
}
