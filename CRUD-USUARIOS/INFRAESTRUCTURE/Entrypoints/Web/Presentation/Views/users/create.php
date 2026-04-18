<?php require __DIR__ . '/../layouts/header.php'; ?> 
<?php require __DIR__ . '/../layouts/menu.php'; ?> 



<h1>Registrar el usuario </h1> 


<?php if (!empty($message)): ?> 

      <div class="alert-error"> 
           <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>

 </div> 

     <?php endif; ?> 

<?php if (!empty($success)): ?>
                <div class="alert-success"> 
               <?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?>

 </div> 

<?php endif; ?>


 <form method="POST" action="?route=users.store"> 

            <div class="form-group"> 
                 <label for="name">Nombre</label><br> 
                 
                 <input type="text" id="name" name="name" 




                    value="<?= htmlspecialchars($old['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>">


 <?php if (!empty($errors['name'])): ?> 

         <div class="field-error">



             <?= htmlspecialchars($errors['name'], ENT_QUOTES, 'UTF-8') ?> 

                  </div> 
                  <?php endif; ?>
              </div> 
               <button type="submit">Registrar usuario</button> 
              
                </form> 

              <?php require __DIR__ . '/../layouts/footer.php'; ?>