<?php



class InvalidUserEmailExeption extends InvalidArgumentException

{
     public  static function becauseFormatIsInvalid($email)
     {
       return new self('El formato del mail es invalido: ' .$email);


     }

     public static function becauseValuesIsEmpity()
     {
        return new self('el email del usuario no puede estar vacio.');
     }

}