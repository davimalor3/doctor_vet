<?php
require_once __DIR__ . "/config/session_config.php";
require_once __DIR__ . "/config/auth.php";
require_once __DIR__ . "/models/Pets.php";

require_login();

$pets = Pets::getByUser($_SESSION['user_id']);

include 'includes/header.php';
?>

<div class="container py-5">

    <h3 class="fw-bold mb-4" style="color:#2b3990;">Agendar Consulta / Exame</h3>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error']; ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <div class="card p-4">

        <form id="formAgendar" action="controllers/criar_agendamento.php" method="POST">

            <div class="mb-3">
                <label class="form-label">Pet</label>
                <select class="form-select" name="pet_id" required>
                    <option value="">Selecione um pet</option>
                    <?php foreach ($pets as $p): ?>
                        <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['nome_pet']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Especialidade</label>
                <select class="form-select" name="especialidade" required>
                    <option value="">Selecione</option>
                    <option value="radiologia">Radiologia</option>
                    <option value="endoscopia">Endoscopia</option>
                    <option value="nutricionista">Nutricionista</option>
                    <option value="dermatologia">Dermatologia</option>
                    <option value="ortopedia">Ortopedia</option>
                    <option value="vacina">Vacina</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Data</label>
                <input type="date" id="data" name="data" class="form-control" required min="<?= date('Y-m-d') ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Horário</label>
                <input type="time" id="hora" name="hora" class="form-control" required min="08:00" max="18:00">
            </div>

            <div class="mb-3">
                <label class="form-label">Observações</label>
                <textarea class="form-control" name="observacoes"></textarea>
            </div>

            <button class="btn btn-primary w-100">Agendar</button>

        </form>

    </div>

</div>

<?php include 'includes/footer.php'; ?>