<?php

class InvalidUserPasswordExeption extends InvalidArgumentException
  {
    public static function becauseValuesIsEmpty()
      {
        return new self('la contraseña no puede estar vacia .');
      }
      public static function becauseLengthIsTooShort($min)
      {
        return new self('el email del uuario no puee estar vacio.');
      }

  }