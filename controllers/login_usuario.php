<?php
require_once "../config/session_config.php";
require_once "../config/db_config.php";
require_once "../config/auth.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../login.php");
    exit;
}

$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');

if (empty($email) || empty($senha)) {
    $_SESSION['error'] = "Preencha todos os campos.";
    header("Location: ../login.php");
    exit;
}

try {
    $sql = "SELECT id, nome, email, senha, login_attempts, locked_until 
            FROM users WHERE email = :email LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // verificação de usuario existente
    if (!$user) {
        $_SESSION['error'] = "E-mail ou senha incorretos.";
        header("Location: ../login.php");
        exit;
    }

    // verificação se conta está bloqueada por várias tentativas
    if ($user['locked_until'] && strtotime($user['locked_until']) > time()) {
        $_SESSION['error'] = "Serviço indisponível. Tente novamente mais tarde.";
        header("Location: ../login.php");
        exit;
    }

    // verificação de senha
    if (!password_verify($senha, $user['senha'])) {

        // incrementa as tentativas
        $attempts = $user['login_attempts'] + 1;
        $lock_time = null;

        // bloquear após 5 tentativas e bloqueia por 5 minutos (60 * 5)
        if ($attempts >= 5) {
            $lock_time = date("Y-m-d H:i:s", time() + (60 * 5));
        }

        $update = $pdo->prepare("
            UPDATE users SET login_attempts = :attempts, locked_until = :locked WHERE id = :id
        ");
        $update->execute([
            'attempts' => $attempts,
            'locked'   => $lock_time,
            'id'       => $user['id']
        ]);

        $_SESSION['error'] = "E-mail ou senha incorretos.";
        header("Location: ../login.php");
        exit;
    }

    // login success -> resetar tentativas
    $reset = $pdo->prepare("
        UPDATE users SET login_attempts = 0, locked_until = NULL, last_login = NOW()
        WHERE id = :id
    ");
    $reset->execute(['id' => $user['id']]);

    // criação sessão
    login_user($user['id'], $user['nome'], $user['email']);

    // redirecionar para o dashboard
    header("Location: ../dashboard.php");
    exit;
} catch (Exception $e) {
    $_SESSION['error'] = "Erro interno: " . $e->getMessage();
    header("Location: ../login.php");
    exit;
}
