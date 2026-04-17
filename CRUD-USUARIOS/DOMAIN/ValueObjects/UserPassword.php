<?php 


declare(strip_types=1);


require_once __DIR__. '/../Exceptions/InvalidUserPasswordException.php';



class UserPassword


{


  private string $value;

    public function __construct(string $value)

   {
           $normalized = trim($value);

    if (strlen($normalized) < 8) {
      throw InvalidUserPasswordException::becauseLengthIsTooShort(8);
    }


        $this->value = $normalized;

   }


   public function value(): string
   {
      return $this->value;
   }

    public function equals(UserPassword $other): bool
     {
       return $this->value === $other->value(); 
     }


      public function __toString(): string 
    { 
        return $this->value;

     }
}

