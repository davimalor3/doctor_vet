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

                <!-- Carrossel inicio -->
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


    <!-- Sobre Nós -->
    <div id="sobre_nos">
    </div>
    <section class="py-5 stats-section3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="assets/img/doutora21.jpeg" class="img-fluid" alt="Dr Pet" width="600">
                </div>
                <div class="col-md-6">
                    <h3>Nossa Clínica</h3>
                    <h3 style="text-align: right;"> <span style="
                    background-color: var(--primary);
                    color: white;
                    padding: 4px 8px;
                    border-radius: 8px;">
                            Com 19 anos de experiência...
                        </span></h3>
                    <p><strong>Dr. PET</strong>&nbsp;é uma clínica veterinária completa, que conta com uma equipe de
                        clínicos gerais capacitados, além de diversas especialidades, trazendo os mais avançados
                        recursos da Medicina Veterinária. Tudo para proporcionar os melhores tratamentos, com seriedade
                        e comprometimento.</p>
                    <h3>Missão</h3>
                    <p>Proporcionar serviços que objetivem saúde e bem-estar aos nossos pacientes (os animais) e
                        satisfazer as expectativas dos nossos clientes (os proprietários dos animais).</p>
                    <h3>Visão</h3>
                    <p>Ser reconhecida como uma empresa referência na área clínica, cirúrgica e de especialidades na
                        Medicina Veterinária de pequenos animais. Valores/Princípios: ética, honestidade, transparência,
                        atualização técnica, comprometimento, profissionalismo, excelência em atendimento, respeito e
                        amor aos animais.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pronto ATENDIMENTO -->
    <section class="py-5 stats-section2">
        <div class="container">
            <h4>Aberto24h</h4>
            <h3>Pronto Atendimento</h3>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="atendimento-box">
                        <h5>Cirurgia geral</h5>
                        <p>A Clinica Veterinária Dr Pet tem dois centros cirúrgicos equipados.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="atendimento-box">
                        <h5>Clínica Médica</h5>
                        <p>A Clinica Veterinária Dr Pet tem dois centros cirúrgicos equipados.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="atendimento-box">
                        <h5>Internação</h5>
                        <p>A Clinica Veterinária Dr Pet tem dois centros cirúrgicos equipados.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="atendimento-box">
                        <h5>Vacinação</h5>
                        <p>A Clinica Veterinária Dr Pet tem dois centros cirúrgicos equipados.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- MÉTRICAS -->
    <section class="stats-section py-5">
        <div class="container">
            <div class="row text-center g-4">

                <div class="col-md-3">
                    <div class="stat-box">
                        <i class="bi bi-person-badge-fill"></i>
                        <h2 class="stat-number" data-target="15">0</h2>
                        <p>ESPECIALISTAS</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-box">
                        <i class="bi bi-list-check"></i>
                        <h2 class="stat-number" data-target="21">0</h2>
                        <p>SERVIÇOS OFERECIDOS</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-box">
                        <i class="bi bi-people-fill"></i>
                        <h2 class="stat-number" data-target="5300">+0</h2>
                        <p>CLIENTES ATENDIDOS</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-box">
                        <i class="bi bi-clock-history"></i>
                        <h2 class="stat-number" data-target="24">0</h2>
                        <p>HORAS POR DIA</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Contador métricas -->
    <script src="assets/js/contador_metricas.js"></script>
    <?php include 'includes/footer.php'; ?>