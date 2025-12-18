<h1>Personen</h1>

<?php if (empty($personen)): ?>
    <p>Keine Personen vorhanden.</p>
<?php else: ?>
    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
        <tr>
            <?php foreach (array_keys($personen[0]) as $col): ?>
                <th><?= esc($col) ?></th>
            <?php endforeach; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($personen as $p): ?>
            <tr>
                <?php foreach ($p as $value): ?>
                    <td><?= esc((string)$value) ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>