<?php

class PaisController
{
   private $paisService;
   private $paisWebMapper;


   public function __contruct($paisService, $paisWebMapper)
   {

        $this->paisService = $paisService;
        $this->paisWebMapper =$paisWebMapper;
   }



   public function index(): void
   {

     $paises = $this->paisService->listarTodo();

     View::render('paises/index', ['paises' => $paises]);
  }

        

    public function create ():void
    {

       View:: render('pais/create');

    }


    public function store(): void
    {
        try{
           $datos = $_POST;


          $this->paisService->registro($datos);
        header('Localtion:/paises');

        } catch (Exception $e) {
            echo "Error:" . $e->getMessage();
        }
    }
}