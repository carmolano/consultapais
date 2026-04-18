<?php 

declare(strict_types=1);?>






<?php require __DIR__ . '/../layouts/header.php'; ?> 
<?php require __DIR__ . '/../layouts/menu.php'; ?>



<style>
    .form-container { max-width: 800px; margin: 20px auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
    .form-title { color: #721c24; border-bottom: 2px solid #721c24; margin-bottom: 20px; }
    .grid-form { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .form-group { margin-bottom: 15px; }
    label { font-weight: bold; display: block; margin-bottom: 5px; }
    input, select { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; }
    .btn-submit { background: #721c24; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; width: 100%; margin-top: 20px; font-weight: bold; }
    .btn-submit:hover { background: #5d1919; }
    .alert-error { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px; }
    .alert-success { background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px; }
</style>

<div class="form-container">
    <h1 class="form-title">Registrar Nuevo País</h1> 

    <?php if (!empty($message)): ?> 
        <div class="alert-error"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></div> 
    <?php endif; ?> 

    <?php if (!empty($success)): ?>
        <div class="alert-success"><?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?></div> 
    <?php endif; ?>

    <form method="POST" action="?route=countries.store"> 
        <div class="grid-form">
            <div>
                <div class="form-group">
                    <label>Nombre del País</label>
                    <input type="text" name="nombre" value="<?= htmlspecialchars($old['nombre'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                </div>
                <div class="form-group">
                    <label>Presidente</label>
                    <input type="text" name="presidente" value="<?= htmlspecialchars($old['presidente'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="form-group">
                    <label>Continente</label>
                    <select name="continente">
                        <option value="América">América</option>
                        <option value="Europa">Europa</option>
                        <option value="Asia">Asia</option>
                        <option value="África">África</option>
                        <option value="Oceanía">Oceanía</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nombre del Himno</label>
                    <input type="text" name="nombreHimno" value="<?= htmlspecialchars($old['nombreHimno'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="form-group">
                    <label>Idioma Principal</label>
                    <input type="text" name="idiomaPrincipal" value="<?= htmlspecialchars($old['idiomaPrincipal'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                </div>
            </div>

            <div>
                <div class="form-group">
                    <label>Número de Habitantes</label>
                    <input type="number" name="numHabitantes" value="<?= htmlspecialchars($old['numHabitantes'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="form-group">
                    <label>Núm. Departamentos</label>
                    <input type="number" name="numDepartamentos" value="<?= htmlspecialchars($old['numDepartamentos'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="form-group">
                    <label>Núm. Municipios</label>
                    <input type="number" name="numMunicipios" value="<?= htmlspecialchars($old['numMunicipios'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="form-group">
                    <label>Núm. Universidades</label>
                    <input type="number" name="numUniversidades" value="<?= htmlspecialchars($old['numUniversidades'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="form-group">
                    <label>Tipo de Democracia</label>
                    <input type="text" name="tipoDemocracia" value="<?= htmlspecialchars($old['tipoDemocracia'] ?? '', ENT_QUOTES, 'UTF-8') ?>" placeholder="Ej: Presidencialista">
                </div>
            </div>
        </div>

        <button type="submit" class="btn-submit">Guardar Información del País</button> 
    </form> 
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>