<?php

declare(strict_types=1);


require_once __DIR__ . '/../../Persistence/MySQL/Connection.php';

$connection = new Connection(
    '179.1.90.68',
    3306,   
    'consultapais',
    'root',
    ''   
);


$pdo = $connection->createpdo();
$paises = $pdo->query("SELECT * FROM paises")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">  
    <head>
    <meta charset="UTF-8">
    <title>Listado de Países</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f4f4; padding: 20px; }
        .table-card { background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        th { background-color: #721c24 !important; color: white; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="table-card">
        <h2 class="mb-4" style="color: #721c24;">🌍 Países Registrados</h2>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Presidente</th>
                    <th>Continente</th>
                    <th>Habitantes</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($paises as $p): ?>
                <tr>
                    <td><?= htmlspecialchars($p['nombre']) ?></td>
                    <td><?= htmlspecialchars($p['presidente']) ?></td>
                    <td><?= htmlspecialchars($p['continente']) ?></td>
                    <td><?= number_format((float)$p['numHabitantes']) ?></td>
                    <td>
                        <button class="btn btn-sm btn-warning">Editar</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <a href="?route=home" class="btn btn-secondary mt-3">Volver al Menú</a>
    </div>
</div>

</body>
</html>
