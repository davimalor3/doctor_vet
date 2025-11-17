<?php
require_once __DIR__ . "/config/session_config.php";
require_once __DIR__ . "/config/auth.php";
// middleware
require_login();
include 'includes/header.php';
?>

<style>
.dashboard-welcome {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 25px;
}

.action-card {
    background: #fff;
    border: 1px solid #e5e5e5;
    border-radius: 12px;
    padding: 25px;
    transition: 0.25s ease;
}

.action-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
}

.logout-btn {
    font-size: 1.1rem !important;
    padding: 10px 24px !important;
    border-radius: 10px;
}

.btn-cadastrar-top {
    font-size: 1.05rem;
    padding: 10px 20px;
    border-radius: 10px;
    background-color: var(--primary);
    border-color: var(--primary);
    color: #fff;
}

.btn-cadastrar-top:hover {
    background-color: #178f74;
    border-color: #178f74;
}

.menu-link-top {
    font-size: 1.05rem;
    font-weight: 600;
    color: #2b3990 !important;
    padding: 8px 14px !important;
}
</style>

<!-- CONTEÚDO PRINCIPAL-->
<div class="container py-5">

    <!-- BEM-VINDO -->
    <div class="dashboard-welcome mb-5">
        <h3 class="fw-bold" style="color:#2b3990;">Bem-vindo(a), <?php echo $_SESSION['nome']; ?>!</h3>
        <p class="text-muted mb-0">Gerencie seus pets, agendamentos e histórico de forma simples.</p>
        <h5 style="text-align: right;">Tem um animalzinho? Então, cadastre seu pet.<br><br>
            <a href="cadastro_pet.php" class="btn btn-success">Cadastrar Pet</a>
        </h5>
    </div>

    <!-- CARDS PRINCIPAIS -->
    <div class="row g-4">

        <!-- MEUS PETS -->
        <div class="col-md-4">
            <div class="action-card text-center h-100">
                <h4 class="mt-2 fw-bold" style="color:#2b3990;">Meus Pets</h4>
                <p class="text-muted">Veja todos os pets cadastrados e acesse seus dados.</p>
                <a href="meus_pets.php" class="btn btn-outline-primary mt-2">Acessar</a>
            </div>
        </div>

        <!-- AGENDAMENTO -->
        <div class="col-md-4">
            <div class="action-card text-center h-100">
                <h4 class="mt-2 fw-bold" style="color:#2b3990;">Agendamento</h4>
                <p class="text-muted">Marque consultas e exames para seus pets.</p>
                <a href="agendar.php" class="btn btn-outline-primary mt-2">Agendar</a>
            </div>
        </div>

        <!-- HISTÓRICO -->
        <div class="col-md-4">
            <div class="action-card text-center h-100">
                <h4 class="mt-2 fw-bold" style="color:#2b3990;">Histórico</h4>
                <p class="text-muted">Vacinas, consultas, exames e tudo sobre seu pet.</p>
                <a href="historico.php" class="btn btn-outline-primary mt-2">Ver Histórico</a>
            </div>
        </div>

    </div>
</div>

<?php include 'includes/footer.php'; ?>