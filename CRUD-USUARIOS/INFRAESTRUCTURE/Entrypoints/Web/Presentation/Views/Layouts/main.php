<?php declare(strict_types=1); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>mi sistema</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body { 
        font-family: Arial, sans-serif; 
         margin: 30px; 

       } 

         nav a { 
              margin-right: 12px; 
           } .alert-error { 

               margin: 12px 0; 
               padding: 10px; 
               border: 1px solid #d33; 
               background: #fdeaea; 


        } 
              .alert-success { 
                    margin: 12px 0; 
                    padding: 10px; 
                    border: 1px solid #2d8a34; 
                    background: #eaf8ec; 

        } 
          .field-error { 
                  color: #c00;
                 font-size: 0.9rem;
      }

               .form-group { 
                     margin-bottom: 14px; 
      } 
            label { 
                   display: inline-block; 
                   margin-bottom: 4px; 
        } 
          input { 
              min-width: 280px; 
              padding: 6px; 
       } 
         
             button { 
              padding: 8px 14px; 
     
           } 
              select { 
                     min-width: 280px; 
                     padding: 6px; 
           } 
               table { 

               border-collapse: collapse; 

            } 

              table th, table td { 
                  padding: 8px 12px; 
                  border: 1px solid #ccc; 
                  text-align: left; 
           
            } 
                table.detail-table th { 
                       background: #f5f5f5; 
                        width: 140px; 
              
                    } 
                       
                      .btn { 
            
                            display: inline-block; 
                            padding: 5px 12px; 
                            text-decoration: none; 
                            cursor: pointer;  
                            border: none; 
                            border-radius: 3px; 
                            font-size: 0.9rem; 
                             background: #e0e0e0; 
                             color: #333; 
                  }
                    .btn-primary { background: #0066cc; color: #fff; } 
                    .btn-primary:hover { background: #0052a3; }




              .btn-warning { background: #e68a00; color: #fff; } 
              .btn-warning:hover { background: #cc7a00; } 
              .btn-danger { background: #cc2200; color: #fff; } 
              .btn-danger:hover { background: #aa1a00; } 
              .btn-sm { padding: 3px 8px; font-size: 0.8rem; } 

              .auth-box { 
                     max-width: 420px; 
                     margin: 40px auto; 
                     padding: 28px; border: 
                     1px solid #ddd; 
                     border-radius: 6px; 
                     background: #fafafa; 
          
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
                    <label class="form-label">Contraseña</label>
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