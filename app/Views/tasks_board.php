<?php
$spalten = $spalten ?? [];
$tasksBySpalte = $tasksBySpalte ?? [];
?>

<div class="container-fluid mt-4 px-4">
    <div class="card shadow-sm mx-auto" style="width: fit-content; max-width: 100%;">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Taskboard</h2>
            <a href="<?= base_url('tasks/create') ?>" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Neue Task
            </a>
        </div>
        <div class="card-body p-3">
            <div class="taskboard-wrapper">
                <div class="taskboard-container">
                    <?php foreach ($spalten as $spalte): ?>
                <div class="taskboard-column">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-light">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0 text-truncate"><?= esc($spalte['spalte']) ?></h5>
                                    <span class="badge bg-secondary text-white ms-2">
                                        <?= count($tasksBySpalte[$spalte['id']] ?? []) ?>
                                    </span>
                                </div>
                                <a href="<?= base_url('tasks/create?spaltenid=' . $spalte['id']) ?>"
                                   class="btn btn-sm btn-outline-secondary"
                                   title="Task in dieser Spalte erstellen">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                            <?php if (!empty($spalte['spaltenbeschreibung'])): ?>
                                <small class="text-muted d-block text-truncate"><?= esc($spalte['spaltenbeschreibung']) ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="card-body tasks-container">
                            <?php if (empty($tasksBySpalte[$spalte['id']])): ?>
                                <p class="text-muted text-center py-4">
                                    <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                    Keine Tasks
                                </p>
                            <?php else: ?>
                                <?php foreach ($tasksBySpalte[$spalte['id']] as $task): ?>
                                <div class="card mb-3 shadow-sm task-card">
                                    <div class="card-body p-3">
                                        <!-- Header mit Titel und Dropdown-Menü -->
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <h6 class="card-title mb-0 flex-grow-1">
                                                <?php if (!empty($task['taskartenicon'])): ?>
                                                    <i class="<?= esc($task['taskartenicon']) ?> me-2 text-primary"></i>
                                                <?php endif; ?>
                                                <?= esc($task['tasktitel']) ?>
                                            </h6>
                                            <!-- Dropdown-Menü -->
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-light dropdown-toggle"
                                                        type="button"
                                                        data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a class="dropdown-item" href="<?= base_url('tasks/edit/' . $task['id']) ?>">
                                                            <i class="fas fa-pen me-2 text-primary"></i>Bearbeiten
                                                        </a>
                                                    </li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li>
                                                        <a class="dropdown-item text-danger"
                                                           href="<?= base_url('tasks/delete/' . $task['id']) ?>"
                                                           onclick="return confirm('Task wirklich löschen?');">
                                                            <i class="fas fa-trash me-2"></i>Löschen
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Taskart Badge -->
                                        <div class="mb-3">
                                            <span class="badge bg-info text-dark">
                                                <?= esc($task['taskartname']) ?>
                                            </span>
                                            <?php if ($task['erledigt'] == 1): ?>
                                                <span class="badge bg-success">✓ Erledigt</span>
                                            <?php endif; ?>
                                        </div>

                                        <!-- Erstelldatum und Erinnerungsdatum -->
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-calendar-plus text-muted me-1"></i>
                                                <small class="text-muted">
                                                    <?php
                                                    try {
                                                        echo (new \DateTime($task['erstelldatum']))->format('d.m.Y');
                                                    } catch (\Exception $e) {
                                                        echo '';
                                                    }
                                                    ?>
                                                </small>
                                            </div>
                                            <?php if (!empty($task['erinnerung']) && !empty($task['erinnerungsdatum'])): ?>
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-bell text-warning me-1"></i>
                                                    <small class="fw-medium">
                                                        <?php
                                                        try {
                                                            echo (new \DateTime($task['erinnerungsdatum']))->format('d.m.Y H:i');
                                                        } catch (\Exception $e) {
                                                            echo '';
                                                        }
                                                        ?>
                                                    </small>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <!-- Zugeordnete Person -->
                                        <div class="d-flex align-items-center mt-3 pt-2 border-top">
                                            <i class="fas fa-user-circle fa-lg text-secondary me-2"></i>
                                            <div>
                                                <small class="d-block fw-medium">
                                                    <?= esc($task['vorname'] . ' ' . $task['nachname']) ?>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php if (empty($spalten)): ?>
                <div class="taskboard-column">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Keine Spalten vorhanden. Bitte erstellen Sie zuerst Spalten unter
                        <a href="<?= base_url('spalten') ?>">Spalten</a>.
                    </div>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style>
/* Taskboard Wrapper - ermöglicht horizontales Scrollen */
.taskboard-wrapper {
    overflow-x: auto;
    overflow-y: hidden;
    padding-bottom: 15px;
}

/* Flexbox Container für die Spalten */
.taskboard-container {
    display: flex;
    flex-wrap: nowrap;
    gap: 20px;
}

/* Einzelne Spalte - feste Breite */
.taskboard-column {
    flex: 0 0 350px;
    min-width: 350px;
    max-width: 350px;
}

/* Tasks Container innerhalb der Spalte */
.tasks-container {
    background-color: #fff;
    min-height: 400px;
    max-height: calc(100vh - 280px);
    overflow-y: auto;
    padding: 15px;
}

/* Task-Card Styling */
.task-card {
    background-color: #fff;
}

/* Horizontale Scrollbar Styling */
.taskboard-wrapper::-webkit-scrollbar {
    height: 10px;
}

.taskboard-wrapper::-webkit-scrollbar-track {
    background: #e9ecef;
    border-radius: 5px;
}

.taskboard-wrapper::-webkit-scrollbar-thumb {
    background: #6c757d;
    border-radius: 5px;
}

.taskboard-wrapper::-webkit-scrollbar-thumb:hover {
    background: #495057;
}

/* Vertikale Scrollbar in Spalten */
.tasks-container::-webkit-scrollbar {
    width: 6px;
}

.tasks-container::-webkit-scrollbar-track {
    background: #e9ecef;
    border-radius: 3px;
}

.tasks-container::-webkit-scrollbar-thumb {
    background: #adb5bd;
    border-radius: 3px;
}

.tasks-container::-webkit-scrollbar-thumb:hover {
    background: #6c757d;
}

/* Responsive Anpassungen */
@media (max-width: 576px) {
    .taskboard-column {
        flex: 0 0 320px;
        min-width: 320px;
        max-width: 320px;
    }

    .tasks-container {
        max-height: calc(100vh - 250px);
    }
}
</style>
