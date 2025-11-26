<!-- Inhalt -->
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h2 class="mb-1">Spalte erstellen</h2>
        </div>
        <div class="card-body">
            <form action="#" method="post">
                <!-- Spaltenbezeichnung -->
                <div class="mb-3">
                    <label for="spaltenname" class="form-label">Spaltenbezeichnung</label>
                    <input type="text" class="form-control" id="spaltenname" name="spaltenname" placeholder="Bezeichnung für die Spalte">
                </div>

                <!-- Spaltenbeschreibung -->
                <div class="mb-3">
                    <label for="beschreibung" class="form-label">Spaltenbeschreibung</label>
                    <textarea class="form-control" id="beschreibung" name="beschreibung" rows="4"
                              placeholder="Beschreibung der Spalte"></textarea>
                </div>

                <!-- Sortid -->
                <div class="mb-3">
                    <label for="sortid" class="form-label">Sortid</label>
                    <input type="text" class="form-control" id="sortid" name="sortid" placeholder="z. B. 100">
                </div>

                <!-- Dropdown (Board-Auswahl) -->
                <div class="mb-3">
                    <label for="board" class="form-label">Board</label>
                    <select class="form-select" id="board" name="board">
                        <option selected>Bitte wählen...</option>
                        <option value="boardA">Board A</option>
                        <option value="boardB">Board B</option>
                        <option value="boardC">Board C</option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary me-2">Speichern</button>
                    <a href="/spalten" class="btn btn-secondary">Abbrechen</a>
                </div>
            </form>

        </div>
    </div>
</div>