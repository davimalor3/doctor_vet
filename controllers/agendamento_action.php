<?php
require_once "../config/session_config.php";
require_once "../config/auth.php";
require_once "../models/Agendamento.php";

require_login();

$action = $_REQUEST['action'] ?? null;
$id     = $_REQUEST['id'] ?? 0;


if ($action === 'confirmar') {
    Agendamento::updateStatus($id, $_SESSION['user_id'], 'confirmado');
    header("Location: ../historico.php");
    exit;
}

if ($action === 'cancelar') {
    Agendamento::updateStatus($id, $_SESSION['user_id'], 'cancelado');
    header("Location: ../historico.php");
    exit;
}

if ($action === 'reagendar' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = $_POST['data'] ?? null;
    $hora = $_POST['hora'] ?? null;

    if (!$data || !$hora) {
        header("Location: ../historico.php");
        exit;
    }

    $nova_data_hora = "$data $hora:00";

    // impede datas passadas
    if ($nova_data_hora < date("Y-m-d H:i:s")) {
        $_SESSION['error'] = "Não é possível reagendar para um horário passado.";
        header("Location: ../reagendar.php?id=" . $id);
        exit;
    }

    // validacao dehorario entre 08 e 18
    if ($hora < "08:00" || $hora > "18:00") {
        $_SESSION['error'] = "Horário inválido. Permitido das 08:00 às 18:00.";
        header("Location: ../reagendar.php?id=" . $id);
        exit;
    }

    // vallida se  horario ja foi ocupado
    if (Agendamento::horarioOcupado($nova_data_hora, $id)) {
        $_SESSION['error'] = "Este horário já está ocupado.";
        header("Location: ../reagendar.php?id=" . $id);
        exit;
    }

    // reagenda
    Agendamento::reagendar($id, $nova_data_hora);

    $_SESSION['success'] = "Reagendado com sucesso!";
    header("Location: ../historico.php");
    exit;
}

header("Location: ../historico.php");
exit;
