<?php

 class InvalidUserIdException extends InvalidArgumentException
{
  public static function becauseValuesIsEmpty()
  {
  return new self('EL Id del usuario  no puede estar vacio.');
  } 

}