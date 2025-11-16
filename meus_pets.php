<?php
require_once __DIR__ . "/config/session_config.php";
require_once __DIR__ . "/config/auth.php";
require_once __DIR__ . "/models/Pets.php";

require_login();
$pets = Pets::getByUser($_SESSION['user_id']);

include 'includes/header.php';
?>
<style>
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
        transition: 0.25s ease;
    }

    .pet-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    }

    .pet-card h5 {
        color: #2b3990;
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

    .pet-info {
        font-size: 0.95rem;
        color: #555;
        margin-bottom: 4px;
    }
</style>

<!-- Conteudo Principalç -->
<div class="container py-5">

    <!-- BEM-VINDO / TÍTULO -->
    <div class="dashboard-welcome mb-5">
        <h3 class="fw-bold" style="color:#2b3990;">Meus Pets</h3>
        <p class="text-muted mb-0">Aqui estão todos os seus pets cadastrados com todas as informações.</p>
    </div>

    <!-- LISTA DE PETS -->
    <div class="row g-4">
        <div class="row g-4">

            <?php if (empty($pets)): ?>

                <div class="text-center py-5">
                    <h4 class="text-muted">Você ainda não cadastrou nenhum pet.</h4>
                    <a href="cadastro_pet.php" class="btn btn-success mt-3 px-4 py-2">Cadastrar Primeiro Pet</a>
                </div>

            <?php else: ?>

                <?php foreach ($pets as $pet): ?>
                    <div class="col-md-4">
                        <div class="pet-card">
                            <h5 class="fw-bold"><?= htmlspecialchars($pet['nome_pet']) ?></h5>
                            <p class="pet-info"><strong>Espécie:</strong> <?= ucfirst($pet['especie']) ?></p>
                            <p class="pet-info"><strong>Raça:</strong> <?= $pet['raca'] ?></p>
                            <p class="pet-info"><strong>Sexo:</strong> <?= ucfirst($pet['sexo']) ?></p>
                            <p class="pet-info"><strong>Idade:</strong> <?= $pet['idade'] ?> anos</p>
                            <p class="pet-info"><strong>Peso:</strong> <?= $pet['peso'] ?> kg</p>
                            <p class="pet-info"><strong>Cor:</strong> <?= $pet['cor'] ?></p>
                            <p class="pet-info"><strong>Observações:</strong> <?= $pet['observacoes'] ?></p>

                            <a href="editar_pet.php?id=<?= $pet['id'] ?>" class="btn btn-primary btn-sm mt-3">Editar</a>
                            <a href="controllers/delete_pet.php?id=<?= $pet['id'] ?>" class="btn btn-danger btn-sm mt-3"
                                onclick="return confirm('Deseja realmente excluir este pet?');">
                                Excluir
                            </a>

                        </div>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>

        </div>

        <!-- INFORMAÇÕES DE TESTE PARA TESTAR PAGINA -->
        <!-- <div class="col-md-4">
            <div class="pet-card">
                <h5 class="fw-bold">Bolt</h5>
                <p class="pet-info"><strong>Espécie:</strong> Cachorro</p>
                <p class="pet-info"><strong>Raça:</strong> Labrador</p>
                <p class="pet-info"><strong>Idade:</strong> 3 anos</p>
                <p class="pet-info"><strong>Sexo:</strong> Macho</p>
                <p class="pet-info"><strong>Peso:</strong> 18 kg</p>
                <p class="pet-info"><strong>Observações:</strong> Muito ativo e amigável.</p>
            </div>
        </div> -->

        <!-- <div class="col-md-4">
            <div class="pet-card">
                <h5 class="fw-bold">Luna</h5>
                <p class="pet-info"><strong>Espécie:</strong> Gato</p>
                <p class="pet-info"><strong>Raça:</strong> Siamês</p>
                <p class="pet-info"><strong>Idade:</strong> 2 anos</p>
                <p class="pet-info"><strong>Sexo:</strong> Fêmea</p>
                <p class="pet-info"><strong>Peso:</strong> 4 kg</p>
                <p class="pet-info"><strong>Observações:</strong> Gosta de brincar com bolinhas.</p>
            </div>
        </div> -->

        <!-- <div class="col-md-4">
            <div class="pet-card">
                <h5 class="fw-bold">Max</h5>
                <p class="pet-info"><strong>Espécie:</strong> Cachorro</p>
                <p class="pet-info"><strong>Raça:</strong> Poodle</p>
                <p class="pet-info"><strong>Idade:</strong> 5 anos</p>
                <p class="pet-info"><strong>Sexo:</strong> Macho</p>
                <p class="pet-info"><strong>Peso:</strong> 7 kg</p>
                <p class="pet-info"><strong>Observações:</strong> Calmo e gosta de passear.</p>
            </div>
        </div> -->

    </div>
</div>

<!-- FOOTER -->
<?php include 'includes/footer.php'; ?>
<!-- ----------------------------------- -->