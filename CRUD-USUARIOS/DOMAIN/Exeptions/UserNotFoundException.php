<?php

class IserNotFoundException extends DomainException
  {
     public static function becauseIdWasFound($id)
      {
          return new self('no se encontró un usuario con el ID:'.$id);
     
       }
}
