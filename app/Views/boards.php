<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h2 class="mb-1">Boards</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="<?= base_url('boards/create') ?>" class="btn btn-primary">Erstellen</a>
            </div>

            <table class="table table-bordered table-striped">
                <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Bezeichnung</th>
                    <th>Aktion</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($boards as $b): ?>
                    <tr>
                        <td><?= esc($b['id']) ?></td>
                        <td><?= esc($b['board']) ?></td>
                        <td>
                            <a href="<?= base_url('boards/edit/' . $b['id']) ?>"
                               class="btn btn-sm btn-primary me-1"
                               title="Bearbeiten">
                                <i class="fa-solid fa-pen"></i>
                            </a>

                            <a href="<?= base_url('boards/delete/' . $b['id']) ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Board wirklich löschen?');">
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
