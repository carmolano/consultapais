<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/menu.php'; ?>

<div class="container">
    <h1>Agregar País</h1>
    <p>Completa los datos para registrar un nuevo país.</p>

    <?php if (!empty($message)): ?>
        <div class="alert-success"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></div>
    <?php endif; ?>

    <form method="post" action="?route=paises.store">
        <div class="form-group">
            <label for="nombre">Nombre del país</label><br>
            <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($old['nombre'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
        </div>

        <div class="form-group">
            <label for="habitantes">Número de habitantes</label><br>
            <input type="number" id="habitantes" name="habitantes" value="<?= htmlspecialchars($old['habitantes'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
        </div>

        <div class="form-group">
            <label for="democracia">Tipo de democracia</label><br>
            <select id="democracia" name="democracia" required>
                <option value="" <?= empty($old['democracia']) ? 'selected' : '' ?>>Selecciona un tipo</option>
                <option value="Parlamentaria" <?= ($old['democracia'] ?? '') === 'Parlamentaria' ? 'selected' : '' ?>>Parlamentaria</option>
                <option value="Presidencialista" <?= ($old['democracia'] ?? '') === 'Presidencialista' ? 'selected' : '' ?>>Presidencialista</option>
                <option value="Semipresidencialista" <?= ($old['democracia'] ?? '') === 'Semipresidencialista' ? 'selected' : '' ?>>Semipresidencialista</option>
                <option value="Otra" <?= ($old['democracia'] ?? '') === 'Otra' ? 'selected' : '' ?>>Otra</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Agregar País</button>
        <a href="?route=paises.index" class="btn btn-warning">Volver al menú país</a>
    </form>
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
