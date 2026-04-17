<?php

declare(strict_typass=1);

final class InvalidCredentialsException extends RuntimeException
        {
      
          public static function becauseCredentialsAreInvalid(): self
          {
        return new self('correo o contraseña incorrecta.');

           }

  public static function becauseUserIsNotactive(): self
              {

                     return new self('tu cuenta no esta activa.contacta al administrador.');
                   }
        }