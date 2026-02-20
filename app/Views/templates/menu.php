<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-custom py-3">
    <div class="container-fluid px-4">
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url('/') ?>">
            <img src="/logo.svg" alt="Logo" height="60" class="me-3">
        </a>
        <ul class="navbar-nav gap-3">
            <li class="nav-item"><a class="nav-link text-white px-3" href="<?= base_url('tasks/personen') ?>"><i class="fas fa-users me-2"></i>Personen</a></li>
            <li class="nav-item"><a class="nav-link text-white px-3" href="<?= base_url('tasks') ?>"><i class="fas fa-tasks me-2"></i>Tasks</a></li>
            <li class="nav-item"><a class="nav-link text-white px-3" href="<?= base_url('boards') ?>"><i class="fas fa-clipboard me-2"></i>Boards</a></li>
            <li class="nav-item"><a class="nav-link text-white px-3" href="<?= base_url('spalten') ?>"><i class="fas fa-columns me-2"></i>Spalten</a></li>
        </ul>
    </div>
</nav>

<main class="flex-grow-1">
    <div class="container mt-4">
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>

