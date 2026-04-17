<?php
require_once __DIR__ . '/../ValueObjects/UserId.php';
require_once __DIR__ . '/../ValueObjects/UserName.php';
require_once __DIR__ . '/../ValueObjects/UserEmail.php';
require_once __DIR__ . '/../ValueObjects/UserPassword.php'; 
require_once __DIR__ . '/../Enums/UserRoleEnum.php'; 
require_once __DIR__ . '/../Enums/UserStatusEnum.php';

 final class UserModel 


{ 
    private UserId $id;
    private UserName $name;
    private UserEmail $email;
    private UserPassword $password;
    private string $role;
    private string $status;


      public function __construct(
      UserId $id, UserName $name, UserEmail $email, 
      UserPassword $password, 
      string $role, string $status 
 
 
      ) {
           UserRoleEnum::ensureIsValid($role);
           UserStatusEnum::ensureIsValid($status);




 $this->id = $id;
 $this->name = $name;
 $this->email = $email;
 $this->password = $password;
 $this->role = $role;
 $this->status = $status;

 }


 public  static function create (
 

 UserId $id, UserName $name , UserEmail $email,
 UserPassword $password, string $role 

 ): self
           
 {


               return new self(
                $id, $name ,$email, 
                $password, $role, UserStatusEnum::PENDING);
    
 }



 public function id(): UserId { return $this->id; }
 public function name(): UserName { return $this->name; } 
 public function email(): UserEmail { return $this->email; }
 public function password(): UserPassword { return $this->password; }
 public function role(): string { return $this->role; } 
 public function status(): string { return $this->status; } 


 public function activate(): self
 {

           return new self(
           $this->id, $this->name, $this->email,
           $this->password, $this->role, UserStatusEnum::ACTIVE 

   ); 
 } 

 public function deactivate(): self

 { 
                return new self( $this->id, $this->name, $this->email,
                $this->password, $this->role, UserStatusEnum::INACTIVE
         );  

 }
         
  public static function fromPrimitives(
            ?string $id,
            string $name,
            string $email,
            string $password,
            string $role,
            string $status
          ): self{
              return new self(
                  new UserId($id),
                  new UserName($name),
                  new UserEmail($email),
                  new UserPassword($password),
                  $role,
                  $status
      
            );
   
   }


   public function changePassword(UserPassword $newPassword): self
{
    $this->password = $newPassword;
    return $this;
}


} 