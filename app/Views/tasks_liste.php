<!-- Inhalt -->
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h2 class="mb-1">Tasks</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="<?= base_url('tasks/create') ?>" class="btn btn-primary">Neu</a>
            </div>
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Notizen</th>
                    <th>Spalte</th>
                    <th>Taskart</th>
                    <th>Zugewiesen an</th>
                    <th>Erstellt</th>
                    <th>Status</th>
                    <th>Aktion</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= esc($task['id']) ?></td>
                        <td>
                            <strong><?= esc($task['tasktitel']) ?></strong>
                        </td>
                        <td><?= esc($task['notizen'] ?? '') ?></td>
                        <td><?= esc($task['spaltenname']) ?></td>
                        <td><?= esc($task['taskartname']) ?></td>
                        <td>
                            <?= esc($task['vorname'] . ' ' . $task['nachname']) ?><br>
                            <small class="text-muted"><?= esc($task['email']) ?></small>
                        </td>
                        <td>
                            <?php
                            $formatted = '';
                            if (!empty($task['erstelldatum'])) {
                                try {
                                    $formatted = (new \DateTime($task['erstelldatum']))->format('d.m.Y');
                                } catch (\Exception $e) {
                                    $formatted = '';
                                }
                            }
                            ?>
                            <small><?= esc($formatted) ?></small>
                        </td>
                        <td>
                            <?php if ($task['erledigt'] == 1): ?>
                                <span class="badge bg-success">✓ Erledigt</span>
                            <?php else: ?>
                                <span class="badge bg-warning">In Arbeit</span>
                            <?php endif; ?>
                        </td>
                        <td>

                            <a href="<?= base_url('tasks/edit/' . $task['id']) ?>" class="btn btn-sm btn-primary me-2">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="<?= base_url('tasks/delete/' . $task['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Sind Sie sicher, dass Sie diese Aufgabe löschen möchten?');">
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
