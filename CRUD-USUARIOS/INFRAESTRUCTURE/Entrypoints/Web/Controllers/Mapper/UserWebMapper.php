<?php

declare(strict_types=1);


final class UserWebMapper
{

  public function fromCreateRequestToCommand(CreateUserWebRequest $request) 

    {
      return new CreateUserCommand(
        $request -> getid(),
              $request -> getName(),
              $request -> getEmail(),
              $request -> getPassword(),
              $request -> getRole()
              );     

    }
  public function fromUpdateRequestToCommand(UpdateUserWebRequest $request): UpdateUserCommand
  {
      
     return new UpdateUserCommand(
              $request -> getid(),
              $request -> getName(),
              $request -> getEmail(),
              $request -> getPassword(),
              $request -> getRole()
              
            );
  }
  
   public function fromIdToGetByIdQuery(string $id): GetUserByIdQuery
   {
    return new GetUserByIdQuery($id);
   }


   public function fromIdToDeleteCommand(string $id): DeleteUserCommand
   {
       return new DeleteUserCommand($id);
   }


   public function fromModelToResponses(UserModel $user): UserResponse
    {
             return new UserResponse(
              $user->id()->value(),
              $user->name()->value(),
              $user->email()->value(),
              $user->role(),
              $user->status()
             );

    }

    public function fromModelsToResponse(array $users):array
      {
            $responses = [];
            foreach ($users as $user){
              $responses[] = $this->fromModelsToResponse($user);

            }
            return  $responses;

      }
          
      


      public function fromModelToResponse(UserModel $user): UserResponse
       {
        return new UserResponse(
          $user->id()->value(),
            $user->name()->value(),
            $user->email()->value(),
            $user->role(),
            $user->status()
        );

     }

 









}
