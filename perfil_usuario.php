<?php
require_once __DIR__ . "/config/session_config.php";
require_once __DIR__ . "/config/auth.php";
require_once __DIR__ . "/models/User.php";

// middleware
require_login();
include 'includes/header.php';
?>

