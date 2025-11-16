<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clínica Veterinária Dr. Pet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <header class="bg-white shadow-sm">
        <nav class="navbar navbar-expand-lg navbar-light container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="assets/img/logo.jpg" alt="Logo Dr. Pet" class="me-2 rounded-circle" width="50" height="50" />
                <div>
                    <strong class="d-block">Clínica Dr. Pet</strong>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="servicos.php">Serviços</a></li>
                    <li class="nav-item"><a class="nav-link" href="especialidades.php">Especialidades</a></li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-success btn-sm" href="cadastro.php">Cadastrar</a>
                    </li>
                    <li class="nav-item ms-3 nav-login">
                        <a href="login.php" class="nav-link p-0">
                            <i class="bi bi-person-circle"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <?php if (!empty($_SESSION['user_id'])): ?>
                            <a href="controllers/logout.php" class="btn btn-danger">Sair</a>
                        <?php endif; ?>

                    </li>
                </ul>
            </div>
        </nav>
    </header>