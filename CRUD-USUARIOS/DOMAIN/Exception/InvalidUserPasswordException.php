<?php

class InvalidUserPasswordException extends InvalidArgumentException
  {
    public static function becauseValuesIsEmpty()
      {
        return new self('la contraseña no puede estar vacia .');
      }
      public static function becauseLengthIsTooShort($min)
      {
        return new self('la contraseña debe tener al menos '  . $min. ' 12 caracteres');
      }

  }