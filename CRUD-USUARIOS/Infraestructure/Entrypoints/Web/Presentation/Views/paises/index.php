<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/menu.php'; ?>

<div class="container my-5">
    <div class="card p-4 shadow-sm" style="border-radius: 12px;">
        <h1 class="mb-3">Menú País</h1>
        <p class="mb-4">Aquí puedes acceder a las funciones de gestión de países.</p>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-primary">
                    <div class="card-body">
                        <h3 class="card-title">Listado de países</h3>
                        <p class="card-text">Revisa todos los países registrados en la base de datos.</p>
                        <a href="?route=paises.index" class="btn btn-primary">Ver países</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-success">
                    <div class="card-body">
                        <h3 class="card-title">Agregar país</h3>
                        <p class="card-text">Registra un nuevo país en el sistema.</p>
                        <a href="?route=paises.create" class="btn btn-success">Crear país</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-warning">
                    <div class="card-body">
                        <h3 class="card-title">Volver</h3>
                        <p class="card-text">Regresa al menú principal.</p>
                        <a href="?route=home" class="btn btn-warning">Menú principal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
