<?php
// config/db_config.php

$dbHost = '127.0.0.1';
$dbName = 'db_clinica_vet';
$dbUser = 'root';
$dbPass = '';
$dbPort = '3306';

$dsn = "mysql:host={$dbHost};port={$dbPort};dbname={$dbName};charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO($dsn, $dbUser, $dbPass, $options);
} catch (PDOException $e) {

    // não mostra detalhes ao usuário. Registre em log.
    error_log('DB connection error: ' . $e->getMessage());

    // retorna um erro genérico
    http_response_code(500);
    echo 'Erro interno. Tente novamente mais tarde.';
    exit;
}
