<?php

class InvalidUserIdExceptions extends InvalidArgumentException
{
  public static function becauseValuesIsEmpty()
  {
    return new self('EL Id del uuario  no puede estar vacio.');
  } 

}