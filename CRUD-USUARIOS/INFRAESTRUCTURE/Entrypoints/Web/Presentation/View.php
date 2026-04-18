<?php



declare(strict_types=1);




final class View



{
      public static function render(string $template, array $data = array()): void
 {



 
 
 
$baseDir = __DIR__ . '/Views/';

 $file = $baseDir . $template . '.php'; 



        if (!file_exists($file)) {
            $file = $baseDir . 'Layouts/' . $template . '.php';
            if (!file_exists($file)) {
                throw new RuntimeException('Vista no encontrada: ' . $template);
            }



 }
      extract($data, EXTR_SKIP);
      require $file;
 }


     public static function redirect(string $route): void 
   {
    header("Location: index.php?route={$route}");
    exit;
   }
}


    
