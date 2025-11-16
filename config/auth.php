<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1 TODO: implementar verificação de sessão expirada
// 1 TODO: implementar regenereted_id()
// 1 TODO: implementar proteção contra ataques de CSRF -> implementar tokens para formulários

// 2 TODO: implementar verificação de user agent e IP
// 2 TODO: implementar logout automático após inatividade
// 2 TODO: implementar timeout de sessão
// 2 TODO: implementar monitoramento de sessão suspeita
// 2 TODO: implementar politicas de expiração de sessão
// 2 TODO: implementar autenticação baseada em tokens (JWT, OAuth, etc) e autenticação 2fatores


function login_user($id, $nome = null, $email = null)
{
    $_SESSION['user_id'] = $id;
    if ($nome)  $_SESSION['nome']  = $nome;
    if ($email) $_SESSION['email'] = $email;
    $_SESSION['logged_in'] = true;
}
function require_login()
{
    if (empty($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }
}
function logout_user()
{
    session_destroy();
    header("Location: login.php");
    exit;
}
