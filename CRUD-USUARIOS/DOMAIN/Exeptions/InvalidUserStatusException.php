<?php

class InvalidUserStatusException extends InvalidArgumentException
{
    public static function becauseValuesIsInvalid($values)
    {
        return new self('El estado "'.$values.'"no es un estado valido.');
    }


}
