<!-- HEADER -->
<?php include 'includes/header.php'; ?>

<style>
.especialidade-card {
    border-radius: 15px;
    padding: 25px;
    transition: 0.3s;
    background: #ffffff7a;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}

.especialidade-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0 18px rgba(0, 0, 0, 0.12);
}

.especialidade-img {
    height: 120px;
    width: 120px;
    margin: 0 auto 15px auto;
    object-fit: contain;
}

.especialidade-card h4 {
    text-align: center;
    font-weight: 600;
    margin-bottom: 10px;
}

.especialidade-card p {
    text-align: center;
    color: #444;
}
</style>

<!-- CONTEUDO PRINCIPAL -->
<div class="container py-5">
    <h1 class="mb-2 text-center fw-bold">Especialidades Veterinárias</h1>
    <p class="text-center lead text-muted mb-5">
        Conheça as áreas em que nossa equipe oferece atendimento especializado.
    </p>

    <div class="row g-4">

        <!-- CARD 1 -->
        <div class="col-md-4 d-flex">
            <div class="especialidade-card">
                <img src="https://cvan.vet.br/wp-content/uploads/2023/07/Property-1endocrino.png"
                    class="especialidade-img">
                <h4>Endoscopia / Colonoscopia</h4>
                <p>A endoscopia e a colonoscopia permitem examinar o trato gastrointestinal com precisão e segurança.
                </p>
            </div>
        </div>

        <!-- CARD 2 -->
        <div class="col-md-4 d-flex">
            <div class="especialidade-card">
                <img src="https://cvan.vet.br/wp-content/uploads/2023/07/Property-1gastro.png"
                    class="especialidade-img">
                <h4>Gastroenterologia</h4>
                <p>Especialidade responsável por cuidar do estômago, intestinos, fígado e pâncreas.</p>
            </div>
        </div>

        <!-- CARD 3 -->
        <div class="col-md-4 d-flex">
            <div class="especialidade-card">
                <img src="https://cvan.vet.br/wp-content/uploads/2023/07/nutri.png" class="especialidade-img">
                <h4>Nutricionista</h4>
                <p>A nutrição adequada garante mais saúde, energia e qualidade de vida para o pet.</p>
            </div>
        </div>

        <!-- CARD 4 -->
        <div class="col-md-4 d-flex">
            <div class="especialidade-card">
                <img src="https://cvan.vet.br/wp-content/uploads/2023/07/Property-1oftalmo.png"
                    class="especialidade-img">
                <h4>Oftalmologia</h4>
                <p>Diagnóstico e tratamento de doenças oculares, garantindo visão saudável ao pet.</p>
            </div>
        </div>

        <!-- CARD 5 -->
        <div class="col-md-4 d-flex">
            <div class="especialidade-card">
                <img src="https://cvan.vet.br/wp-content/uploads/2023/07/Property-1ultrasom.png"
                    class="especialidade-img">
                <h4>Ultrassonografia</h4>
                <p>Exame de imagem seguro para avaliar órgãos internos e auxiliar diagnósticos.</p>
            </div>
        </div>

        <!-- CARD 6 -->
        <div class="col-md-4 d-flex">
            <div class="especialidade-card">
                <img src="https://cvan.vet.br/wp-content/uploads/2023/07/Property-1Gastroenterologia.png"
                    class="especialidade-img">
                <h4>Endocrinologia</h4>
                <p>Especialidade dedicada às doenças hormonais e metabólicas dos animais.</p>
            </div>
        </div>

    </div>
</div>

<!-- ---------------------------------- -->
<!-- FOOTER -->
<?php include 'includes/footer.php'; ?>