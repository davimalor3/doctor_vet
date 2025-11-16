<?php
require_once "../config/session_config.php";
require_once "../config/auth.php";
require_once "../models/Pets.php";

require_login();

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: ../meus_pets.php");
    exit;
}

$id = $_GET['id'];

$ok = Pets::delete($id, $_SESSION['user_id']);

if ($ok) {
    $_SESSION['success'] = "Pet excluído com sucesso!";
} else {
    $_SESSION['error'] = "Erro ao excluir pet!";
}

header("Location: ../meus_pets.php");
exit;
