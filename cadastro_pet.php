    <?php
    require_once __DIR__ . "/config/session_config.php";
    require_once __DIR__ . "/config/auth.php";
    // middleware
    require_login();

    // ====== HEADER =======
    include 'includes/header.php';
    ?>

    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="mb-3">Cadastrar Novo Pet</h2>
            <p class="text-muted">Preencha as informações abaixo para adicionar um novo pet ao seu perfil.</p>
        </div>
    </section>

    <!-- Mensagem de erro -->
    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger text-center">
            <?= $_SESSION['error']; ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <!-- FORMULÁRIO -->
    <section class="py-3">
        <div class="container">
            <div class="card shadow-sm p-4 mx-auto" style="max-width: 700px;">

                <form action="controllers/cadastrar_pet.php" method="POST">

                    <div class="mb-3">
                        <label class="form-label">Nome do Pet</label>
                        <input type="text" name="nome_pet" class="form-control" placeholder="Ex: Thor, Luna, Bob"
                            maxlength="120" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Espécie</label>
                            <select name="especie" class="form-select" required>
                                <option></option>
                                <option value="cachorro">Cachorro</option>
                                <option value="gato">Gato</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Raça</label>
                            <input type="text" name="raca" class="form-control"
                                placeholder="Ex: Golden Retriever, Siamês">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Idade</label>
                            <input type="number" name="idade" class="form-control" min="1" maxlength="2"
                                placeholder="Ex: 3" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Peso (kg)</label>
                            <input type="number" name="peso" step="0.1" class="form-control" min="1"
                                placeholder="Ex: 5.4" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Sexo</label>
                            <select name="sexo" class="form-select" required>
                                <option value="macho">Macho</option>
                                <option value="femea">Fêmea</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Cor</label>
                            <input type="text" name="cor" class="form-control" placeholder="Ex: Branco, Preto, Marrom">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Observações</label>
                        <textarea class="form-control" rows="3" name="observacoes"
                            placeholder="Informações adicionais sobre o pet"></textarea>
                    </div>

                    <button class="btn btn-success w-100 py-2 mt-2">
                        Cadastrar Pet
                    </button>
                </form>
            </div>
        </div>
    </section>