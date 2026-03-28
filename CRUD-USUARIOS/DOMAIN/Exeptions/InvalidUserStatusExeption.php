<?php

class InvalidUserStatusExeption extends InvalidArgumentException
{
    public static function becauseValuesIsiNVALID($values)
    {
        return new self('El estado "'.$values.'"no es un estado valido.');
    }


}
