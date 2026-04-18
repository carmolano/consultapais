<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>mi sistema</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { 
            background: linear-gradient(135deg, #667eea, #764ba2);
            height: 100vh;
        }
    </style>
</head>
<body>
<body>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4 shadow-lg" style="width: 100%; max-width: 400px; border-radius: 15px;">
            <h2 class="text-center mb-4">Iniciar Sesión</h2>
            
            <form action="index.php?route=auth.login" method="POST">
                <div class="mb-3">
                    <label class="form-label">Usuario o Email</label>
                    <input type="text" name="username" class="form-control" placeholder="Ingresa tu usuario" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">agrega tu Contraseña</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
                
                <button type="submit" class="btn btn-primary w-100 py-2" style="background: #764ba2; border: none;">
                    Entrar
                </button>
            </form>
            
            <div class="text-center mt-3">
                <a href="index.php?route=password.forgot" class="text-decoration-none" style="color: #764ba2; font-size: 14px;">
                    ¿Olvidaste tu contraseña?
                </a>
            </div>
        </div>
    </div>

</body>
  

</body>
</html>