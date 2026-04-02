<?php

class InvalidUserRoleExeptions extends InvalidArgumentException
{
    public static function becausValueIsInvalid($value)
    {
        return new self('El rol"'.$value. '" no es un rol valido');
    }
}