<?php
require_once __DIR__ . "/config/session_config.php";
require_once __DIR__ . "/config/auth.php";
require_once __DIR__ . "/models/Agendamento.php";

require_login();

$id = $_GET['id'] ?? 0;
$ag = Agendamento::get($id);

// valida se existe agendamento
if (!$ag) {
    header("Location: historico.php");
    exit;
}

// quebra data e hora
$data = date("Y-m-d", strtotime($ag['data_hora']));
$hora = date("H:i", strtotime($ag['data_hora']));

include 'includes/header.php';
?>

<div class="container py-5">

    <h3 class="fw-bold mb-4" style="color:#2b3990;">Reagendar Atendimento</h3>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error']; ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <div class="card p-4">

        <form action="controllers/agendamento_action.php?action=reagendar&id=<?= $ag['id'] ?>" method="POST">

            <div class="mb-3">
                <label class="form-label">Pet</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($ag['nome_pet']) ?>" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Serviço</label>
                <input type="text" class="form-control" value="<?= ucfirst($ag['especialidade']) ?>" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Nova Data</label>
                <input type="date" name="data" class="form-control" value="<?= $data ?>" min="<?= date('Y-m-d') ?>"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Novo Horário</label>
                <input type="time" name="hora" class="form-control" value="<?= $hora ?>" min="08:00" max="18:00"
                    required>
            </div>

            <button class="btn btn-primary mt-3">Salvar Reagendamento</button>
            <a href="historico.php" class="btn btn-secondary mt-3">Cancelar</a>

        </form>

    </div>
</div>

<?php include 'includes/footer.php'; ?>