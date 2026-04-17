<?php




class PaisRepositoryMySQL  implements PaisRepository

{

 private $db;

   public function __construct($db)
    {
        $this->db = $db;
    }


     public function save(PaisModel $pais):void
    {
        $sql =  "INSERT INTO pais (nombre, presidnete, contiente ,....) VALUE(?,?,?, ....)";
    }
     
     public function getALL(): array
    {
        return [];
    }


     public function findByName(string $nombre): ? PaisModel

    {
        return null;
    }

    

    public  function delete(string $nombre): void 
    {
        

         
    }

              





}