<?php
require_once __DIR__ . "/config/session_config.php";
require_once __DIR__ . "/config/auth.php";

// verifica se está logado e redireciona para dashboard
if (!empty($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}

include 'includes/header.php'; ?>

<!-- Mensagem de erro -->
<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger text-center">
        <?= $_SESSION['error']; ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<!-- FORMULÁRIO DE CADASTRO -->
<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-white p-4">
                <div class="text-center mb-4">
                    <i class="bi bi-person-circle fs-1 text-success"></i>
                    <h2 class="mt-2 mb-0">Crie sua conta</h2>
                    <p class="text-muted mb-0">Cuide melhor do seu pet 🐾</p>
                </div>

                <form action="controllers/cadastrar_usuario.php" method="POST">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome completo</label>
                        <input type="text" id="nome" name="nome" class="form-control" maxlength="120"
                            placeholder="Ex: Ana Souza" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" id="email" name="email" class="form-control" maxlength="150"
                            placeholder="exemplo@dominio.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="tel" id="telefone" name="telefone" class="form-control" maxlength="30"
                            placeholder="(00) 9 0000-0000" required>
                        <!-- <small class="text-muted">Formato: (99) 9 9999-9999</small> -->
                    </div>

                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" id="senha" name="senha" class="form-control" minlength="6"
                            placeholder="Mínimo 6 caracteres" required>
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-success btn-lg">
                            <i class="bi bi-check2-circle me-2"></i> Cadastrar
                        </button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <small>Já tem uma conta?</small><br>
                    <a href="login.php" class="text-decoration-none">Acesse sua conta</a>
                </div>
            </div>
        </div>
    </div>
</main>


<!-- footer -->
<?php include 'includes/footer.php'; ?>