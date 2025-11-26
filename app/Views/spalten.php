<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Spalten</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Eigene CSS -->
    <link rel="stylesheet" href="/css/style.css">
</head>

<body class="d-flex flex-column min-vh-100">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="/">
            <img src="/logo.svg" height="40" class="me-2">
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

    <!-- Button oben -->
    <div class="mb-3">
        <a href="/erstellen" class="btn btn-primary">Erstellen</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <h5 class="card-title mb-3">Spalten</h5>

            <table class="table table-bordered table-striped">
                <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Board</th>
                    <th>Sortid</th>
                    <th>Spalte</th>
                    <th>Beschreibung</th>
                    <th>Bearbeiten</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>1</td>
                    <td>Board A</td>
                    <td>10</td>
                    <td>ToDo</td>
                    <td>Alle Aufgaben, die noch nicht begonnen wurden</td>
                    <td>
                        <i class="fa-solid fa-pen me-2"></i>
                        <i class="fa-solid fa-trash text-danger"></i>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Board A</td>
                    <td>20</td>
                    <td>In Arbeit</td>
                    <td>Aufgaben, die aktuell bearbeitet werden</td>
                    <td>
                        <i class="fa-solid fa-pen me-2"></i>
                        <i class="fa-solid fa-trash text-danger"></i>
                    </td>
                </tr>
                </tbody>
            </table>

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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>