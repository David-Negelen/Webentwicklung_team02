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
                    <form method="post" action="submit">
                        <?php if (isset($task)): ?>
                            <input type="hidden" name="task_id" value="<?= esc($task['id']) ?>">
                        <?php endif; ?>
                        <div class="mb-3">
                            <label for="tasks" class="form-label">Taskbezeichnung</label>
                            <input type="text" class="form-control <?= isset($errors['tasks']) ? 'is-invalid' : '' ?>" id="tasks" name="tasks" placeholder="Taskbezeichnung" value="<?= old('tasks', isset($task) ? esc($task['tasks']) : '') ?>">
                            <?php if (isset($errors['tasks'])): ?>
                                <div class="invalid-feedback"><?= esc($errors['tasks']) ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="taskartenid" class="form-label">Taskart</label>
                                    <select class="form-select <?= isset($errors['taskartenid']) ? 'is-invalid' : '' ?>" id="taskartenid" name="taskartenid">
                                        <option value="">-- Bitte auswählen --</option>
                                        <?php foreach ($taskarten as $taskart) : ?>
                                            <option value="<?= esc($taskart['id']) ?>"
                                                <?php
                                                    $selectedTaskartId = old('taskartenid', isset($task) ? $task['taskartenid'] : '');
                                                    if ($selectedTaskartId == $taskart['id']) echo 'selected';
                                                ?>><?= esc($taskart['taskart']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (isset($errors['taskartenid'])): ?>
                                        <div class="invalid-feedback"><?= esc($errors['taskartenid']) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="personenid" class="form-label">Person</label>
                                    <select class="form-select <?= isset($errors['personenid']) ? 'is-invalid' : '' ?>" id="personenid" name="personenid">
                                        <option value="">-- Bitte auswählen --</option>
                                        <?php foreach ($personen as $person) : ?>
                                            <option value="<?= esc($person['id']) ?>"
                                                <?php
                                                    $selectedPersonenId = old('personenid', isset($task) ? $task['personenid'] : '');
                                                    if ($selectedPersonenId == $person['id']) echo 'selected';
                                                ?>><?= esc($person['vorname'] . ' ' . $person['name']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (isset($errors['personenid'])): ?>
                                        <div class="invalid-feedback"><?= esc($errors['personenid']) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="spaltenid" class="form-label">Spalte</label>
                                    <select class="form-select <?= isset($errors['spaltenid']) ? 'is-invalid' : '' ?>" id="spaltenid" name="spaltenid">
                                        <option value="">-- Bitte auswählen --</option>
                                        <?php
                                        $selectedSpaltenId = old('spaltenid', isset($task) ? $task['spaltenid'] : ($preselectedSpaltenId ?? ''));
                                        foreach ($spalten as $spalte) :
                                        ?>
                                            <option value="<?= esc($spalte['id']) ?>" <?= $selectedSpaltenId == $spalte['id'] ? 'selected' : '' ?>><?= esc($spalte['spalte']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (isset($errors['spaltenid'])): ?>
                                        <div class="invalid-feedback"><?= esc($errors['spaltenid']) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="erinnerungsdatum" class="form-label">Erinnerungsdatum</label>
                                    <input type="datetime-local" class="form-control" id="erinnerungsdatum" name="erinnerungsdatum" value="<?= old('erinnerungsdatum', isset($task) && $task['erinnerungsdatum'] ? substr($task['erinnerungsdatum'], 0, 16) : '') ?>">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="hidden" name="erinnerung" value="0">
                            <input type="checkbox" class="form-check-input" id="erinnerung" name="erinnerung" value="1" <?= old('erinnerung', isset($task) && $task['erinnerung'] ? 'checked' : '') ? 'checked' : '' ?>>
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
                            <textarea class="form-control" id="notizen" name="notizen" rows="4" placeholder="Geben Sie hier zusätzliche Informationen ein..."><?= old('notizen', isset($task) ? esc($task['notizen']) : '') ?></textarea>
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
