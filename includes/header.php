<?php
require_once __DIR__ . "/../config/session_config.php";
$logged = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Clínica Veterinária Dr. PET</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ícones do bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- CSS DO SISTEMA -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header class="main-header shadow-sm bg-white">
        <nav class="container d-flex align-items-center justify-content-between py-3">

            <!-- LOGO -->
            <a href="index.php" class="logo d-flex align-items-center text-decoration-none">
                <img src="assets/img/logo.jpg" width="44" height="44" class="rounded-circle me-2">
                <span class="fs-5 fw-bold text-dark">DoctorVet</span>
            </a>

            <!-- MENU P/ DESKTOP -->
            <ul class="nav d-none d-md-flex align-items-center gap-3 mb-0">

                <li><a class="nav-link hv" href="index.php">Home</a></li>
                <li><a class="nav-link hv" href="servicos.php">Serviços</a></li>
                <li><a class="nav-link hv" href="especialidades.php">Especialidades</a></li>

                <?php if (!$logged): ?>
                    <li><a class="btn btn-primary btn-sm" href="login.php">Entrar</a></li>

                <?php else: ?>

                    <!-- botão DROPDOWN -->
                    <li class="dropdown">
                        <button class="btn btn-outline-secondary btn-sm account-btn" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-list"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item dd-hv" href="dashboard.php">Dashboard</a></li>
                            <li><a class="dropdown-item dd-hv" href="meus_pets.php">Meus Pets</a></li>
                            <li><a class="dropdown-item dd-hv" href="historico.php">Histórico</a></li>
                            <li><a class="dropdown-item dd-hv" href="agendar.php">Agendamentos</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger dd-hv" href="controllers/logout.php">Sair</a></li>
                        </ul>
                    </li>

                <?php endif; ?>
            </ul>

            <!-- MENU P/ MOBILE -->
            <div class="d-flex d-md-none align-items-center gap-2">

                <?php if ($logged): ?>
                    <!-- <div class="dropdown">
                        <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="dropdown">
                            <i class="bi bi-list"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item dd-hv" href="dashboard.php">Dashboard</a></li>
                            <li><a class="dropdown-item dd-hv" href="meus_pets.php">Meus Pets</a></li>
                            <li><a class="dropdown-item dd-hv" href="historico.php">Historico</a></li>
                            <li><a class="dropdown-item dd-hv" href="agendar.php">Agendamentos</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger dd-hv" href="controllers/logout.php">Sair</a></li>
                        </ul>
                    </div> -->
                <?php endif; ?>

                <!-- MENU toggle mobile -->
                <button class="mobile-menu-toggle btn btn-light btn-sm">
                    <i class="bi bi-list"></i>
                </button>

            </div>

        </nav>

        <!-- MENU MOBILE EXPANDIDO -->
        <div id="mobileMenu" class="mobile-menu d-md-none">
            <div class="container py-3">
                <a class="mobile-link hv d-block mb-3" href="index.php">Home</a>
                <a class="mobile-link hv d-block mb-3" href="servicos.php">Serviços</a>
                <a class="mobile-link hv d-block mb-3" href="especialidades.php">Especialidades</a>

                <?php if ($logged): ?>
                    <hr>
                    <a class="mobile-link hv d-block mb-3" href="dashboard.php">Dashboard</a>
                    <a class="mobile-link hv d-block mb-3" href="meus_pets.php">Meus Pets</a>
                    <a class="mobile-link hv d-block mb-3" href="historico.php">Histórico</a>
                    <a class="mobile-link hv d-block mb-3" href="agendar.php">Agendamentos</a>
                    <a class="mobile-link text-danger hv d-block" href="controllers/logout.php">Sair</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <script>
        // Toggle mobile menu
        const toggle = document.querySelector('.mobile-menu-toggle');
        const menu = document.getElementById('mobileMenu');

        if (toggle && menu) {
            toggle.addEventListener('click', () => {
                menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
            });
        }
    </script>