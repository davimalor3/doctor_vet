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
$data          = $_POST['data'];
$hora          = $_POST['hora'];
//converte para formato do banco de dados
$data_hora = "$data $hora:00";
$observacoes   = trim($_POST['observacoes'] ?? '');


// validar pet pertence ao usuário
$pet = Pets::get($pet_id, $_SESSION['user_id']);
if (!$pet) {
    $_SESSION['error'] = "Pet inválido.";
    header("Location: ../agendar.php");
    exit;
}

if (empty($pet_id) || empty($especialidade) || empty($data) || empty($hora)) {
    $_SESSION['error'] = "Preencha todos os campos obrigatórios.";
    header("Location: ../agendar.php");
    exit;
}

// verifica se horário está ocupado
if (Agendamento::horarioOcupado($data_hora)) {
    $_SESSION['error'] = "Este horário já está agendado. Escolha outro.";
    header("Location: ../agendar.php");
    exit;
}
//verifica se o dia ou hora ja pasou
if (strtotime($data_hora) < time()) {
    $_SESSION['error'] = "A data/hora selecionada já passou.";
    header("Location: ../agendar.php");
    exit;
}

// valida horario de funcionamento
$horaSelecionada = date("H:i", strtotime($data_hora));

if ($horaSelecionada < "08:00" || $horaSelecionada > "18:00") {
    $_SESSION['error'] = "O horário deve ser entre 08:00 e 18:00.";
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
