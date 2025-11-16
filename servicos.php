<!-- HEADER -->
<?php include 'includes/header.php'; ?>

<!-- SEÇÃO PRINCIPAL -->
<section class="py-5 bg-gradient">
    <div class="container text-center">
        <h1 class="mb-2 text-center fw-bold">
            Clínica Veterinária <span class="highlight">Dr. Pet</span>
        </h1>
        <p class="lead text-muted">
            Conheça nossos principais serviços voltados ao bem-estar e à saúde do seu pet.
        </p>
    </div>
</section>

<!-- SERVIÇOS -->
<section class="py-5 bg-light">
    <div class="container">
        <h3 class="text-center mb-5">Nossos Serviços</h3>
        <div class="row g-4">
            <!-- Vacinação -->
            <div class="col-md-6">
                <div class="card h-100 shadow-sm service-card text-center p-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="bi bi-eyedropper fs-1 text-success"></i>
                        </div>
                        <h5 class="card-title mb-3">Vacinação</h5>
                        <p class="card-text text-muted">
                            Vacinas para cães e gatos, protegendo contra doenças graves e garantindo o bem-estar.
                        </p>
                        <a href="vacinacao.php" class="stretched-link small">Saiba mais</a>
                    </div>
                </div>
            </div>

            <!-- Prevenção e Cuidados -->
            <div class="col-md-6">
                <div class="card h-100 shadow-sm service-card text-center p-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <i class="bi bi-heart-pulse fs-1 text-success"></i>
                        </div>
                        <h5 class="card-title mb-3">Prevenção e Cuidados</h5>
                        <p class="card-text text-muted">
                            Dicas e programas de prevenção para garantir a saúde e qualidade de vida do seu pet.
                        </p>
                        <a href="prevencao.php" class="stretched-link small">Saiba mais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<?php include 'includes/footer.php'; ?>