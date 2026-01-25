<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h2 class="mb-1"><?= !empty($board['id']) ? 'Board bearbeiten' : 'Board erstellen' ?></h2>
        </div>
        <div class="card-body">

            <form action="/public/boards/submit" method="post">
                <?= csrf_field() ?>

                <input type="hidden" name="board_id" value="<?= esc($board['id'] ?? '') ?>">

                <div class="mb-3">
                    <label for="boardname" class="form-label">Bezeichnung</label>
                    <input type="text"
                           class="form-control <?= isset($validation) && $validation->hasError('board') ? 'is-invalid' : '' ?>"
                           id="boardname"
                           name="board"
                           placeholder="Bezeichnung für das Board"
                           value="<?= esc($board['board'] ?? '') ?>">
                    <?php if (isset($validation) && $validation->hasError('board')): ?>
                        <div class="invalid-feedback"><?= $validation->getError('board') ?></div>
                    <?php endif; ?>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary me-2">Speichern</button>
                    <a href="/public/boards" class="btn btn-secondary">Abbrechen</a>
                </div>
            </form>

        </div>
    </div>
</div>
