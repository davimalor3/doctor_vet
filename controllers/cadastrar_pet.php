<?php
require_once "../config/session_config.php";
require_once "../config/auth.php";
require_once "../models/Pets.php";
//middlewarr
require_login();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../cadastro_pet.php");
    exit;
}
// inputs do formulario de cadastro do Pet
$nome_pet     = trim($_POST['nome_pet']);
$especie  = trim($_POST['especie']);
$sexo     = trim($_POST['sexo']);
$raca     = trim($_POST['raca']);
$idade    = trim($_POST['idade']);
$peso     = trim($_POST['peso']);
$cor      = trim($_POST['cor']);
$obs      = trim($_POST['observacoes']);

// validação dos campos
if (empty($nome_pet) || empty($especie) || empty($sexo)) {
    $_SESSION['error'] = "Preencha os campos obrigatórios.";
    header("Location: ../cadastro_pet.php");
    exit;
}

$ok = Pets::create(
    $_SESSION['user_id'],
    $nome_pet,
    $especie,
    $sexo,
    $raca,
    $idade,
    $peso,
    $cor,
    $obs
);

if ($ok) {
    $_SESSION['success'] = "Pet cadastrado com sucesso!";
    header("Location: ../meus_pets.php");
    exit;
} else {
    $_SESSION['error'] = "Erro ao cadastrar pet.";
    header("Location: ../cadastro_pet.php");
    exit;
}
