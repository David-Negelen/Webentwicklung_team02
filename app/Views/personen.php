<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h2 class="mb-1">Personen</h2>
        </div>
        <div class="card-body">
            <?php if (empty($personen)): ?>
                <div class="alert alert-info" role="alert">
                    <i class="fa-solid fa-info-circle me-2"></i>
                    Keine Personen vorhanden.
                </div>
            <?php else: ?>
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Vorname</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Passwort</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($personen as $person): ?>
                        <tr>
                            <td><?= esc($person['id']) ?></td>
                            <td><?= esc($person['vorname']) ?></td>
                            <td><?= esc($person['name']) ?></td>
                            <td>
                                <a href="mailto:<?= esc($person['email']) ?>" class="text-decoration-none">
                                    <?= esc($person['email']) ?>
                                </a>
                            </td>
                            <td><?= esc($person['passwort']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>
