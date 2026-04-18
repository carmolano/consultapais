<?php declare(strict_types=1); ?>


<!DOCTYPE html> 
<html lang="es"> 
<head> 


     <meta charset="UTF-8"> 

      <title><?= htmlspecialchars($pageTitle ?? 'CRUD Usuarios', ENT_QUOTES, 'UTF-8') ?></title> 
        <style> 
            body { 
                font-family: Arial, sans-serif; 
                background-color: #f4f4f4; 
                display: flex; 
                justify-content: center; 
                align-items: center; 
                height: 100vh; 
            } 
            .auth-box { 
                background-color: #fff; 
                padding: 20px; 
                border-radius: 8px; 
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
                width: 100%; 
                max-width: 400px; 
            } 
            .form-group { 
                margin-bottom: 15px; 
            } 
            label { 
                display: block; 
                margin-bottom: 5px; 
            } 
            input[type="email"], input[type="password"] { 
                width: 100%; 
                padding: 8px; 
                box-sizing: border-box; 
            } 
            .btn { 
                background-color: #007BFF; 
                color: #fff; 
                padding: 10px 15px; 
                border: none; 
                border-radius: 4px; 
                cursor: pointer; 
            } 

             .btn:hover { background-color: #0056b3; } 

             .alert-error { background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px; } 

             .field-error { color: #dc3545; font-size: 14px; margin-top: 5px; } 
       </style> 
    </head> 
 <body>

 <div style=  "display: flex; flex-direction: column; align-items: center; justify-content: center;">
  <h1 style ="color:#721c24; margin-bottom: 20px;"> ConsultaPais</h1>
<div class="auth-box">
    <h1>Iniciando sesión</h1>


<?php if (!empty($message)): ?>
   <div class="alert-error">
         <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
     </div>
   <?php endif; ?>
<form method="POST" action="?route=auth.authenticate">
     <div class="form-group">
       <label for="email">Correo electrónico  gmail </label><br>
    <input


      type="email"
      id="email"
      name="email"
      value="<?= htmlspecialchars($old['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
       autofocus
     >
      <?php if (!empty($errors['email'])): ?>
   <div class="field-error"><?= htmlspecialchars($errors['email'], ENT_QUOTES, 'UTF-8') ?></div>
   <?php endif; ?>
     </div>
   <div class="form-group">
   <label for="password">Contraseña</label><br>
  <input
type="password"
id="password"
name="password"
autocomplete="current-password"
>
     <?php if (!empty($errors['password'])): ?>
        <div class="field-error"><?= htmlspecialchars($errors['password'], ENT_QUOTES, 'UTF-8') ?></div>
     <?php endif; ?>
</div>
      <button type="submit" class="btn btn-primary">Entrar</button>
</form>
     <p style="margin-top: 16px;">
<a href="?route=auth.forgot">¿Olvidaste tu contraseña?</a>
     </p>
     </div>

