<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Startseite</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- eigene CSS -->
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-custom"">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">Team 02</a>
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link text-white" href="#">Tasks</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="#">Boards</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="#">Spalten</a></li>
        </ul>
    </div>
</nav>

<!-- Inhalt -->
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Tasks</h5>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer-custom text-white mt-5 p-3">
    <div class="container d-flex justify-content-between">
        <span>© Web-Entwicklung Team 02</span>
        <span>Impressum</span>
        <span>Datenschutz</span>
        <span>Kontakt</span>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>