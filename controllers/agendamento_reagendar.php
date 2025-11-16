<?php
require_once "../config/session_config.php";
require_once "../config/auth.php";
require_once "../models/Agendamento.php";

require_login();

$id   = $_POST['id'] ?? 0;
$data = $_POST['data'] ?? null;
$hora = $_POST['hora'] ?? null;

if (!$id || !$data || !$hora) {
    header("Location: ../historico.php");
    exit;
}

$nova_data_hora = $data . " " . $hora . ":00";

// Atualizar
Agendamento::reagendar($id, $nova_data_hora);

header("Location: ../historico.php");
exit;
