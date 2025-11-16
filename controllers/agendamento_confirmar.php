<?php
require_once "../config/session_config.php";
require_once "../config/auth.php";
require_once "../models/Agendamento.php";

require_login();

$id = $_GET['id'] ?? 0;

Agendamento::updateStatus($id, 'confirmado');

header("Location: ../historico.php");
exit;
