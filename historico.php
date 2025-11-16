<?php
require_once __DIR__ . "/config/session_config.php";
require_once __DIR__ . "/config/auth.php";
require_once __DIR__ . "/models/Pets.php";
require_once __DIR__ . "/models/Agendamento.php";

require_login();

$pets = Pets::getByUser($_SESSION['user_id']);

include 'includes/header.php';
?>

<!-- <style>
    /* mantém exatamente o estilo do seu HTML */
    .dashboard-welcome {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 25px;
    }

    .pet-card {
        background: #fff;
        border: 1px solid #e5e5e5;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .pet-card h5 {
        color: #2b3990;
    }

    .history-item {
        font-size: 0.95rem;
        color: #555;
        margin-bottom: 4px;
    }
</style> -->

<div class="container py-5">

    <!-- TÍTULO -->
    <div class="dashboard-welcome mb-5">
        <h3 class="fw-bold" style="color:#2b3990;">Histórico dos Pets</h3>
        <p class="text-muted mb-0">Veja tudo que seus pets já fizeram na clínica.</p>
    </div>

    <div class="row g-4">

        <?php foreach ($pets as $p):
            $historico = Agendamento::getByPet($p['id']);
        ?>
            <div class="col-md-6">
                <div class="pet-card">

                    <h5 class="fw-bold"><?= htmlspecialchars($p['nome_pet']) ?></h5>
                    <p class="history-item"><strong>Espécie:</strong> <?= $p['especie'] ?></p>
                    <p class="history-item"><strong>Raça:</strong> <?= $p['raca'] ?></p>
                    <p class="history-item"><strong>Idade:</strong> <?= $p['idade'] ?> anos</p>

                    <hr>

                    <h6 style="color:#2b3990;">Histórico de Atendimento:</h6>

                    <?php if (empty($historico)): ?>
                        <p class="history-item text-muted">Nenhum atendimento registrado.</p>
                    <?php endif; ?>

                    <?php foreach ($historico as $h): ?>
                        <p class="history-item">
                            <?= date("d/m/Y H:i", strtotime($h['data_hora'])) ?> —
                            <strong><?= ucfirst($h['especialidade']) ?></strong>

                            <?php if ($h['status'] == 'pendente' || $h['status'] == 'confirmado'): ?>
                                <span class="badge bg-warning text-dark">Aguardando</span>
                        <div class="mt-2 d-flex gap-2">

                            <a href="controllers/agendamento_confirmar.php?id=<?= $h['id'] ?>"
                                class="btn btn-success btn-sm">Confirmar</a>

                            <a href="controllers/agendamento_cancelar.php?id=<?= $h['id'] ?>"
                                class="btn btn-danger btn-sm">Cancelar</a>

                            <a href="reagendar.php?id=<?= $h['id'] ?>" class="btn btn-secondary btn-sm">Reagendar</a>

                        </div>

                    <?php elseif ($h['status'] == 'concluido'): ?>
                        <span class="badge bg-success">Concluído</span>

                    <?php elseif ($h['status'] == 'cancelado'): ?>
                        <span class="badge bg-danger">Cancelado</span>
                    <?php endif; ?>

                    </p>
                <?php endforeach; ?>

                </div>
            </div>

        <?php endforeach; ?>

    </div>

</div>

<?php include 'includes/footer.php'; ?>