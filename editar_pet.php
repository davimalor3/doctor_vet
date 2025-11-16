<?php
require_once __DIR__ . "/config/session_config.php";
require_once __DIR__ . "/config/auth.php";
require_once __DIR__ . "/models/Pets.php";
require_login();

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: ../meus_pets.php");
    exit;
}

$pet = Pets::get($_GET['id'], $_SESSION['user_id']);

if (!$pet) {
    header("Location: ../meus_pets.php");
    exit;
}

include 'includes/header.php';
?>

<section class="py-5 bg-light">
    <div class="container">
        <h2 class="mb-3">Editar Pet</h2>
        <p class="text-muted">Atualize apenas os campos permitidos.</p>
    </div>
</section>

<!-- Mensagrm de erro -->
<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger text-center">
        <?= $_SESSION['error']; ?>
    </div>
<?php unset($_SESSION['error']);
endif; ?>

<!-- Formulario -->
<section class="py-3">
    <div class="container">
        <div class="card shadow-sm p-4 mx-auto" style="max-width: 700px;">

            <form action="controllers/editar_pet.php" method="POST">

                <input type="hidden" name="id" value="<?= $pet['id'] ?>">

                <div class="mb-3">
                    <label class="form-label">Nome do Pet</label>
                    <input type="text" name="nome_pet" class="form-control"
                        value="<?= htmlspecialchars($pet['nome_pet']) ?>" required>
                </div>

                <div class="row">
                    <!-- Especie -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Espécie (não editável)</label>
                        <select class="form-select" disabled>
                            <option value="cachorro" <?= $pet['especie'] == 'cachorro' ? 'selected' : ''; ?>>Cachorro
                            </option>
                            <option value="gato" <?= $pet['especie'] == 'gato' ? 'selected' : ''; ?>>Gato</option>
                        </select>
                        <input type="hidden" name="especie" value="<?= $pet['especie'] ?>">
                    </div>

                    <!-- Raça -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Raça (não editável)</label>
                        <input type="text" class="form-control" value="<?= $pet['raca'] ?>" readonly>
                        <input type="hidden" name="raca" value="<?= $pet['raca'] ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Idade</label>
                        <input type="number" name="idade" class="form-control" value="<?= $pet['idade'] ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Peso (kg)</label>
                        <input type="number" name="peso" step="0.1" class="form-control" value="<?= $pet['peso'] ?>">
                    </div>
                </div>

                <div class="row">
                    <!-- Sexo -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Sexo (não editável)</label>
                        <select class="form-select" disabled>
                            <option value="macho" <?= $pet['sexo'] == 'macho' ? 'selected' : ''; ?>>Macho</option>
                            <option value="femea" <?= $pet['sexo'] == 'femea' ? 'selected' : ''; ?>>Fêmea</option>
                        </select>
                        <input type="hidden" name="sexo" value="<?= $pet['sexo'] ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Cor</label>
                        <input type="text" name="cor" class="form-control" value="<?= $pet['cor'] ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Observações</label>
                    <textarea name="observacoes" class="form-control"><?= $pet['observacoes'] ?></textarea>
                </div>

                <button class="btn btn-success w-100 py-2 mt-2">Salvar Alterações</button>

            </form>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>