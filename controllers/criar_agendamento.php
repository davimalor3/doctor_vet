<?php
require_once "../config/session_config.php";
require_once "../config/auth.php";
require_once "../models/Agendamento.php";
require_once "../models/Pets.php";

require_login();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../agendar.php");
    exit;
}

$pet_id        = $_POST['pet_id'];
$especialidade = $_POST['especialidade'];
$data_hora     = $_POST['data_hora'];
$observacoes   = trim($_POST['observacoes'] ?? '');

// valida se o pet pertence ao usuário
$pet = Pets::get($pet_id, $_SESSION['user_id']);
if (!$pet) {
    $_SESSION['error'] = "Pet inválido.";
    header("Location: ../agendar.php");
    exit;
}

if (empty($pet_id) || empty($especialidade) || empty($data_hora)) {
    $_SESSION['error'] = "Preencha os campos obrigatórios.";
    header("Location: ../agendar.php");
    exit;
}

$ok = Agendamento::create($pet_id, $especialidade, $data_hora, $observacoes);

if ($ok) {
    $_SESSION['success'] = "Agendamento realizado!";
    header("Location: ../historico.php");
    exit;
}

$_SESSION['error'] = "Erro ao agendar.";
header("Location: ../agendar.php");
exit;
