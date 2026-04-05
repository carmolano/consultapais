<?php

class UserNotFoundException extends DomainException
  {
     public static function becauseIdWasNotFound($id)
      {
          return new self('no se encontró un usuario con el ID :'. $id);
     
       }
}
