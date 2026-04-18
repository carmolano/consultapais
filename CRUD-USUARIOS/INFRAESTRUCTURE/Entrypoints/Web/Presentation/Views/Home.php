<?php require __DIR__ . '/layouts/header.php'; ?> 
<?php require __DIR__ . '/layouts/menu.php'; ?>



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
         background-color: #FFFF00;

       } 

         nav a { 
              margin-right: 12px; 
           } .alert-error { 

               margin: 12px 0; 
               padding: 10px; 
               border: 1px solid #d33; 
               background: #3a12a8; 


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

<div style=  "display: flex; flex-direction: column; align-items: center; justify-content: center;">
  <h1 style ="color:#721c24; margin-bottom: 20px;"> ConsultaPais</h1>


    <div class="menu-box">
        <h2 style="font-size: 1.6rem; color: #333;">Menú Principal del Sistema</h2>
        <p class="text-muted">Sistema de Gestión de información geográfica y demográfica</p>

        <ul>
            <li>
                <span class="badge-letter">C</span>
                <a class="crud-link" href="?route=countries.create">Registrar País (Presidente, Himno, etc.)</a>
            </li>
            <li>
                <span class="badge-letter">R</span>
                <a class="crud-link" href="?route=countries.search">Consultar por Continente o Idioma</a>
            </li>
            <li>
                <span class="badge-letter">U</span>
                <a class="crud-link" href="?route=countries.update">Actualizar Habitantes y Municipios</a>
            </li>
            <li>
                <span class="badge-letter">D</span>
                <a class="crud-link" href="?route=countries.delete">Eliminar registro de la base de datos</a>
            </li>
            <li>
                <span class="badge-letter">L</span>
                <a class="crud-link" href="?route=countries.list">Listado Global (Democracia y Universidades)</a>
            </li>
        </ul>

        <div style="margin-top: 20px; border-top: 1px solid #eee; padding-top: 15px;">
            <a href="?route=auth.login" style="color: #dc3545; text-decoration: none; font-weight: bold;">← Cerrar sesión</a>
        </div>
    </div>
</div>


</body>
</html>

    <?php require __DIR__ . '/layouts/footer.php'; ?>