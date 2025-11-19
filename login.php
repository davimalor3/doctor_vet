<?php
require_once __DIR__ . "/config/session_config.php";
require_once __DIR__ . "/config/auth.php";

// verifica se está logado e redireciona para dashboard
if (!empty($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}

include 'includes/header.php'; ?>

<!-- BOTÃO DE VOLTAR -->
<div class="container mt-3">
    <a href="index.php" class="btn-back-floating">
        <i class="bi bi-chevron-left"></i>
    </a>
</div>

<!-- Mensagem de erro -->
<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger text-center">
        <?= $_SESSION['error']; ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>


<!-- CONTEÚDO PRINCIPAL -->
<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm p-4">
                <div class="text-center mb-4">
                    <i class="bi bi-person-circle fs-1 text-success"></i>
                    <h2 class="mt-2 mb-0">Login</h2>
                    <p class="text-muted">Acesse sua conta para cuidar do seu pet 🐾</p>
                </div>

                <form action="controllers/login_usuario.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" name="senha" class="form-control" id="senha" required>
                    </div>

                    <button type="submit" class="btn btn-success w-100">
                        <i class="bi bi-box-arrow-in-right me-2"></i> Entrar
                    </button>
                </form>

                <div class="text-center mt-3">
                    <small>Não tem conta?</small><br />
                    <a href="cadastro.php" class="text-decoration-none text-success">Cadastre-se</a>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- ---------------------------------- -->
<!-- FOOTER -->
<?php include 'includes/footer.php'; ?>