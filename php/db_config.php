<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "db_clinica_vet";

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
