<?php require __DIR__ . '/layouts/header.php'; ?> 
<?php require __DIR__ . '/layouts/menu.php'; ?>

<style>
    .hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 60px 20px;
        text-align: center;
        margin-bottom: 40px;
        border-radius: 10px;
    }

    .hero-section h1 {
        font-size: 2.5rem;
        margin-bottom: 15px;
        font-weight: bold;
    }

    .hero-section p {
        font-size: 1.1rem;
        margin: 0;
    }

    .crud-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .crud-card {
        background: white;
        border-radius: 8px;
        padding: 25px;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border-left: 5px solid #667eea;
    }

    .crud-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
    }

    .crud-card .icon {
        font-size: 2.5rem;
        margin-bottom: 15px;
    }

    .crud-card h3 {
        margin-bottom: 10px;
        color: #333;
    }

    .crud-card p {
        color: #666;
        font-size: 0.95rem;
        margin-bottom: 15px;
    }

    .crud-card a {
        display: inline-block;
        background: #667eea;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        transition: background 0.3s ease;
    }

    .crud-card a:hover {
        background: #764ba2;
    }

    .alert-container {
        margin-bottom: 30px;
    }

    .alert-error {
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
        color: #721c24;
        padding: 12px 20px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .alert-success {
        background-color: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
        padding: 12px 20px;
        border-radius: 5px;
        margin-bottom: 20px;
    }
</style>

<div class="container my-5">
    <div class="hero-section">
        <h1>✨ Menú Principal</h1>
        <p>Bienvenido al sistema de gestión de usuarios. Accede a las operaciones que necesites.</p>
    </div>

    <div class="alert-container">
        <?php if (!empty($message)): ?> 
            <div class="alert-error"> 
                <strong>⚠️ Aviso:</strong> <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?> 
            </div> 
        <?php endif; ?> 

        <?php if (!empty($success)): ?> 
            <div class="alert-success"> 
                <strong>✓ Éxito:</strong> <?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?> 
            </div> 
        <?php endif; ?> 
    </div>

    <div class="crud-cards">
        <div class="crud-card">
            <div class="icon">➕</div>
            <h3>Crear Usuario</h3>
            <p>Registra un nuevo usuario en el sistema</p>
            <a href="?route=users.create">Registrar</a>
        </div>

        <div class="crud-card">
            <div class="icon">📋</div>
            <h3>Listar Usuarios</h3>
            <p>Consulta todos los usuarios registrados</p>
            <a href="?route=users.index">Ver Lista</a>
        </div>

        <div class="crud-card">
            <div class="icon">✏️</div>
            <h3>Editar Usuario</h3>
            <p>Modifica la información de usuarios existentes</p>
            <a href="?route=users.index">Editar</a>
        </div>

        <div class="crud-card">
            <div class="icon">🗑️</div>
            <h3>Eliminar Usuario</h3>
            <p>Elimina usuarios del sistema</p>
            <a href="?route=users.index">Gestionar</a>
        </div>
    </div>
</div>

<?php require __DIR__ . '/layouts/footer.php'; ?>