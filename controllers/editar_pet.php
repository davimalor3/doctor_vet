<?php
require_once "../config/session_config.php";
require_once "../config/auth.php";
require_once "../models/Pets.php";
require_login();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../meus_pets.php");
    exit;
}

$id        = $_POST['id'];
$nome      = trim($_POST['nome_pet']);
$especie   = trim($_POST['especie']);
$sexo      = trim($_POST['sexo']);
$raca      = trim($_POST['raca'] ?? '');
$idade     = trim($_POST['idade'] ?? '');
$peso      = trim($_POST['peso'] ?? '');
$cor       = trim($_POST['cor'] ?? '');
$observ    = trim($_POST['observacoes'] ?? '');

if (empty($nome) || empty($especie) || empty($sexo)) {
    $_SESSION['error'] = "Preencha os campos obrigatórios.";
    header("Location: ../editar_pet.php?id=" . $id);
    exit;
}

$ok = Pets::update(
    $id,
    $_SESSION['user_id'],
    $nome,
    $especie,
    $sexo,
    $raca,
    $idade,
    $peso,
    $cor,
    $observ
);

if ($ok) {
    $_SESSION['success'] = "Pet atualizado com sucesso!";
    header("Location: ../meus_pets.php");
    exit;
}

$_SESSION['error'] = "Erro ao atualizar.";
header("Location: ../editar_pet.php?id=" . $id);
exit;
