<?php

require_once __DIR__ . '/../Exceptions/InvalidUserIdExceptions.php';

 class  UserId

{
private $value;

public function __construct($value)    
{
$normalized = trim((string) $value);

   if($normalized ==='') {
     throw InvalidUserIdException::becauseValuesIsEmpty();

}

      $this->value = $normalized;
}


public function value() {return $this-> value;}
public function equals(UserId $other) { return $this->value === $other->value(); }
public function __toString() { return $this->value; } 
   


}





