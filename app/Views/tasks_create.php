<div class="container my-5" >
    <?php
    $errors = session()->getFlashdata('errors') ?? [];
    $taskarten = $taskarten ?? [];
    $personen = $personen ?? [];
    $spalten = $spalten ?? [];
    ?>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0"><?= isset($task) ? 'Task bearbeiten' : 'Neue Task erstellen' ?></h3>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Validierungsfehler:</strong>
                            <ul class="mb-0 mt-2">
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <form method="post" action="submit">
                        <?php if (isset($task)): ?>
                            <input type="hidden" name="task_id" value="<?= esc($task['id']) ?>">
                        <?php endif; ?>
                        <div class="mb-3">
                            <label for="tasks" class="form-label">Taskbezeichnung</label>
                            <input type="text" class="form-control <?= isset($errors['tasks']) ? 'is-invalid' : '' ?>" id="tasks" name="tasks" placeholder="Taskbezeichnung" value="<?= old('tasks', isset($task) ? esc($task['tasks']) : '') ?>" required>
                            <?php if (isset($errors['tasks'])): ?>
                                <div class="invalid-feedback"><?= esc($errors['tasks']) ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="taskartenid" class="form-label">Taskart</label>
                                    <select class="form-select" id="taskartenid" name="taskartenid" required>
                                        <option value="">-- Bitte auswählen --</option>
                                        <?php foreach ($taskarten as $taskart) : ?>
                                            <option value="<?= esc($taskart['id']) ?>" <?= isset($task) && $task['taskartenid'] == $taskart['id'] ? 'selected' : '' ?>><?= esc($taskart['taskart']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="personenid" class="form-label">Person</label>
                                    <select class="form-select" id="personenid" name="personenid" required>
                                        <option value="">-- Bitte auswählen --</option>
                                        <?php foreach ($personen as $person) : ?>
                                            <option value="<?= esc($person['id']) ?>" <?= isset($task) && $task['personenid'] == $person['id'] ? 'selected' : '' ?>><?= esc($person['vorname'] . ' ' . $person['name']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="spaltenid" class="form-label">Spalte</label>
                                    <select class="form-select" id="spaltenid" name="spaltenid" required>
                                        <option value="">-- Bitte auswählen --</option>
                                        <?php foreach ($spalten as $spalte) : ?>
                                            <option value="<?= esc($spalte['id']) ?>" <?= isset($task) && $task['spaltenid'] == $spalte['id'] ? 'selected' : '' ?>><?= esc($spalte['spalte']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="erinnerungsdatum" class="form-label">Erinnerungsdatum</label>
                                    <input type="datetime-local" class="form-control" id="erinnerungsdatum" name="erinnerungsdatum" value="<?= isset($task) && $task['erinnerungsdatum'] ? substr($task['erinnerungsdatum'], 0, 16) : '' ?>">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="hidden" name="erinnerung" value="0">
                            <input type="checkbox" class="form-check-input" id="erinnerung" name="erinnerung" value="1" <?= isset($task) && $task['erinnerung'] ? 'checked' : '' ?>>
                            <label class="form-check-label" for="erinnerung">
                                Erinnerung aktivieren
                            </label>
                        </div>

                        <div class="mb-3 d-none">
                            <label for="sortid" class="form-label">Sort ID</label>
                            <input type="hidden" class="form-control" id="sortid" name="sortid" value="0">
                        </div>

                        <div class="mb-3">
                            <label for="notizen" class="form-label">Notiz</label>
                            <textarea class="form-control" id="notizen" name="notizen" rows="4" placeholder="Geben Sie hier zusätzliche Informationen ein..."><?= isset($task) ? esc($task['notizen']) : '' ?></textarea>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="<?= base_url('tasks') ?>" class="btn btn-secondary">Abbrechen</a>
                            <button type="submit" class="btn btn-primary">Speichern</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
