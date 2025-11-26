<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Erstellen</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- eigene CSS -->
    <link rel="stylesheet" href="/css/style.css">
</head>

<body class="d-flex flex-column min-vh-100">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="/logo.svg" alt="Logo" height="40" class="me-2">
        </a>
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link text-white" href="/">Tasks</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="#">Boards</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="/spalten">Spalten</a></li>
        </ul>
    </div>
</nav>

<!-- Inhalt -->
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-3">Spalten erstellen</h5>

            <form action="#" method="post">
                <!-- Spaltenbezeichnung -->
                <div class="mb-3">
                    <label for="spaltenname" class="form-label">Spaltenbezeichnung</label>
                    <input type="text" class="form-control" id="spaltenname" name="spaltenname" placeholder="z. B. ToDo">
                </div>

                <!-- Spaltenbeschreibung -->
                <div class="mb-3">
                    <label for="beschreibung" class="form-label">Spaltenbeschreibung</label>
                    <textarea class="form-control" id="beschreibung" name="beschreibung" rows="4"
                              placeholder="Beschreibung der Spalte"></textarea>
                </div>

                <!-- Sortid -->
                <div class="mb-3">
                    <label for="sortid" class="form-label">Sortid</label>
                    <input type="text" class="form-control" id="sortid" name="sortid" placeholder="z. B. 10">
                </div>

                <!-- Dropdown (Board-Auswahl) -->
                <div class="mb-3">
                    <label for="board" class="form-label">Board</label>
                    <select class="form-select" id="board" name="board">
                        <option selected>Bitte wählen...</option>
                        <option value="boardA">Board A</option>
                        <option value="boardB">Board B</option>
                        <option value="boardC">Board C</option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary me-2">Speichern</button>
                    <button type="button" class="btn btn-secondary">Abbrechen</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer-custom text-white mt-auto p-3">
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