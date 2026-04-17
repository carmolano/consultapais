<?php 



class PaisModel

{
  private string $nombre;   
  private string $presidente;
  private string $continente;
  private string $nombreHimno;
  private  int  $numHabitantes;
  private  int $numDepartamentos;
  private  int $numMunicipios;
  private string $indiomaPrincipal;
  private int $numUniversidades;
  private string $tipoDemocracia;

  public function __construct(
    $nombre,
    $presidente,
    $continente,
    $nombreHimno,
    $numHabitantes,
    $numDepartamentos,
    $numMunicipios,
    $indiomaPrincipal,
    $numUniversidades,
    $tipoDemocracia
  ) {
     
    $this->nombre = $nombre;
    $this->presidente = $presidente;
    $this->continente = $continente;
    $this->nombreHimno = $nombreHimno;
    $this->numHabitantes = $numHabitantes;
    $this->numDepartamentos = $numDepartamentos;
    $this->numMunicipios = $numMunicipios;
    $this->indiomaPrincipal = $indiomaPrincipal;
    $this->numUniversidades = $numUniversidades;
    $this->tipoDemocracia = $tipoDemocracia;


    if ($this->numHabitantes < 0){
      throw new Exception("El numero de habitantes no puede ser negativo.");
    }

  }
      public static function fromPrimitives(array $data):self
      {

      return new self(
       $data['nombre'],
       $data['presidente'],
       $data['continente'],
       $data['nombreHimno'],
       (int)$data['numHabitantes'],
       (int)$data['numDepartamentos'],
       (int)$data['numMunicipio'],
        $data['idiomaPrincipal'],
        (int)$data['numUniversidad'],
        $data['tipoDemocracia']

    );


 }

        public function nombre():string {return $this->nombre;}
        public function presidente() : string {return $this->presidente;}
        public function contiente (): string {return $this->continente;}
        public function numHabitantes(): int {return $this->numHabitantes;}
         
        
       
}