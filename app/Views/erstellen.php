<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h2 class="mb-1"><?= !empty($spalte['id']) ? 'Spalte bearbeiten' : 'Spalte erstellen' ?></h2>
        </div>
        <div class="card-body">

            <form action="/public/spalten/submit" method="post">
                <?= csrf_field() ?>

                <input type="hidden" name="spalten_id" value="<?= esc($spalte['id'] ?? '') ?>">

                <div class="mb-3">
                    <label for="spaltenname" class="form-label">Spaltenbezeichnung</label>
                    <input type="text"
                           class="form-control <?= isset($validation) && $validation->hasError('spalte') ? 'is-invalid' : '' ?>"
                           id="spaltenname"
                           name="spalte"
                           placeholder="Bezeichnung für die Spalte"
                           value="<?= esc($spalte['spalte'] ?? '') ?>">
                    <?php if (isset($validation) && $validation->hasError('spalte')): ?>
                        <div class="invalid-feedback"><?= $validation->getError('spalte') ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="beschreibung" class="form-label">Spaltenbeschreibung</label>
                    <textarea class="form-control <?= isset($validation) && $validation->hasError('spaltenbeschreibung') ? 'is-invalid' : '' ?>"
                              id="beschreibung"
                              name="spaltenbeschreibung"
                              rows="4"
                              placeholder="Beschreibung der Spalte"><?= esc($spalte['spaltenbeschreibung'] ?? '') ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="sortid" class="form-label">Sortid</label>
                    <input type="number"
                           class="form-control <?= isset($validation) && $validation->hasError('sortid') ? 'is-invalid' : '' ?>"
                           id="sortid"
                           name="sortid"
                           placeholder="z. B. 100"
                           value="<?= esc($spalte['sortid'] ?? '') ?>">
                    <?php if (isset($validation) && $validation->hasError('sortid')): ?>
                        <div class="invalid-feedback"><?= $validation->getError('sortid') ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="board" class="form-label">Board</label>
                    <select class="form-select <?= isset($validation) && $validation->hasError('boardsid') ? 'is-invalid' : '' ?>" id="board" name="boardsid">
                        <option value="">Bitte wählen...</option>
                        <?php foreach ($boards as $b): ?>
                            <option value="<?= esc($b['id']) ?>"
                                    <?= (string)($spalte['boardsid'] ?? '') === (string)$b['id'] ? 'selected' : '' ?>>
                                <?= esc($b['board']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($validation) && $validation->hasError('boardsid')): ?>
                        <div class="invalid-feedback"><?= $validation->getError('boardsid') ?></div>
                    <?php endif; ?>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary me-2">Speichern</button>
                    <a href="/public/spalten" class="btn btn-secondary">Abbrechen</a>
                </div>
            </form>

        </div>
    </div>
</div>