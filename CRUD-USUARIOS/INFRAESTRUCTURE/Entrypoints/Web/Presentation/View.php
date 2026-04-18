<?php



declare(strict_types=1);




final class View



{
      public static function render(string $template, array $data = array()): void
        {


             $file = __DIR__ . '/Views/' . $template . '.php';




             if (!file_exists($file)) {
               $file = __DIR__ . '/Views/users/' . $template . '.php';
          
                }



        if (!file_exists($file)) {
               throw new RuntimeException('La vista "' . $template . '" no se encontró en: ' . $file);
            }



              

                 extract($data, EXTR_SKIP);
                 include $file;    

                 
            }


            public static function redirect(string $routeName): void
            {
                header('Location: ?route=' . $routeName);
                exit;
            }           


}
      

    
