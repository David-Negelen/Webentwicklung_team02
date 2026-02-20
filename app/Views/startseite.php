<!-- Hero Section -->
<section class="hero-section text-center">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="display-3 fw-bold mb-2 text-dark">Team 2</h1>
                <p class="lead fs-4 mb-0 text-muted">Webentwicklung 25/26</p>
            </div>
        </div>
    </div>
</section>

<!-- Navigation Cards -->
<div class="container my-5">
    <div class="row g-4 justify-content-center">

        <!-- Tasks -->
        <div class="col-md-6 col-lg-3">
            <a href="<?= base_url('tasks') ?>" class="text-decoration-none">
                <div class="card h-100 shadow-sm feature-card border-primary">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-tasks feature-icon-large text-primary mb-3"></i>
                        <h5 class="card-title fw-bold text-dark">Tasks</h5>
                        <p class="card-text text-muted">
                            Aufgaben visuell per Drag & Drop auf dem Kanban-Board verwalten.
                        </p>
                        <span class="btn btn-outline-primary mt-2">Öffnen</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Boards -->
        <div class="col-md-6 col-lg-3">
            <a href="<?= base_url('boards') ?>" class="text-decoration-none">
                <div class="card h-100 shadow-sm feature-card border-success">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-clipboard feature-icon-large text-success mb-3"></i>
                        <h5 class="card-title fw-bold text-dark">Boards</h5>
                        <p class="card-text text-muted">
                            Verschiedene Boards für Projekte und Themen erstellen.
                        </p>
                        <span class="btn btn-outline-success mt-2">Öffnen</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Spalten -->
        <div class="col-md-6 col-lg-3">
            <a href="<?= base_url('spalten') ?>" class="text-decoration-none">
                <div class="card h-100 shadow-sm feature-card border-warning">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-columns feature-icon-large text-warning mb-3"></i>
                        <h5 class="card-title fw-bold text-dark">Spalten</h5>
                        <p class="card-text text-muted">
                            Individuelle Spalten für den Workflow definieren.
                        </p>
                        <span class="btn btn-outline-warning mt-2">Öffnen</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Personen -->
        <div class="col-md-6 col-lg-3">
            <a href="<?= base_url('tasks/personen') ?>" class="text-decoration-none">
                <div class="card h-100 shadow-sm feature-card border-info">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-users feature-icon-large text-info mb-3"></i>
                        <h5 class="card-title fw-bold text-dark">Personen</h5>
                        <p class="card-text text-muted">
                            Alle Teammitglieder einsehen und Aufgaben zuweisen.
                        </p>
                        <span class="btn btn-outline-info mt-2">Öffnen</span>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>
