<?php

class InvalidUserNameException extends InvalidArgumentException
 {
    public static function becauseValueIsEmpty()
    {
        return new  self('el nombre del usuario no puede estar vacio.');
    }

    public static function becauselenghtIsTooShort($min)
    {
        return new self('el nombre del usuario debe tener al menos' .$min.'caracteres.');
    }
 }