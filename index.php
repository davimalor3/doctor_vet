    <?php include 'includes/header.php'; ?>



    <!-- Conteudo Principal -->
    <section class="hero py-5 bg-gradient">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-5 mb-3 fw-bold">
                        Clínica Veterinária <span class="text-primary-bold">Dr. Pet</span>
                    </h1>

                    <p class="lead text-muted">
                        Cuidando da saúde e bem-estar do seu melhor amigo com carinho,
                        tecnologia e respeito.
                    </p>

                    <ul class="list-unstyled mb-4">
                        <li><i class="bi bi-check2-circle me-2"></i> Vacinação</li>
                        <li><i class="bi bi-check2-circle me-2"></i> Prevenção e Cuidados</li>
                    </ul>

                    <div class="d-flex gap-3 mt-3">
                        <a href="cadastro.php" class="btn btn-success btn-custom">Cadastrar</a>
                        <a href="servicos.php" class="btn btn-outline-primary btn-custom">Ver Serviços</a>
                    </div>
                </div>

                <div class="col-lg-6 text-center mt-4 mt-lg-0">
                    <div id="carouselPets" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner shadow-lg rounded">
                            <div class="carousel-item active">
                                <img src="assets/img/cachorros.png" class="d-block w-100" alt="Cachorros">

                            </div>
                            <div class="carousel-item">
                                <img src="assets/img/cachorro.png" class="d-block w-100" alt="Cachorro no vet">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/img/gato2.png" class="d-block w-100" alt="Gato">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/img/gato_cachorro.png" class="d-block w-100" alt="Cachorro e gato">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselPets"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselPets"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVIÇOS -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">Nossos Serviços</h3>
                <a href="servicos.php" class="text-decoration-none">Ver todos →</a>
            </div>

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
                                Vacinas para cães e gatos, protegendo contra doenças graves.
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
                                Dicas e programas de prevenção para garantir a saúde do seu pet.
                            </p>
                            <a href="prevencao.php" class="stretched-link small">Saiba mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>