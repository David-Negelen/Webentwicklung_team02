<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h2 class="mb-1">Spalten</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="<?= base_url('spalten/create') ?>" class="btn btn-primary">Erstellen</a>
            </div>

            <table class="table table-bordered table-striped">
                <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Board</th>
                    <th>Sortid</th>
                    <th>Spalte</th>
                    <th>Spaltenbeschreibung</th>
                    <th>Aktion</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($spalten as $s): ?>
                    <tr>
                        <td><?= esc($s['id']) ?></td>
                        <td><?= esc($s['board_name'] ?? '') ?></td>
                        <td><?= esc($s['sortid']) ?></td>
                        <td><?= esc($s['spalte']) ?></td>
                        <td><?= esc($s['spaltenbeschreibung']) ?></td>
                        <td>
                            <a href="<?= base_url('spalten/edit/' . $s['id']) ?>"
                               class="btn btn-sm btn-primary me-1"
                               title="Bearbeiten">
                                <i class="fa-solid fa-pen"></i>
                            </a>

                            <a href="<?= base_url('spalten/delete/' . $s['id']) ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Spalte wirklich löschen?');">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>