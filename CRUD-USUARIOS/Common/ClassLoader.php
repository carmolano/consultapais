<?php


declare(strict_types=1);


final class ClassLoader
{
    private static array $classMap = array( 

 'InvalidUserEmailException' => 'Domain/Exceptions/InvalidUserEmailException.php', 
 'InvalidUserIdException' => 'Domain/Exceptions/InvalidUserIdException.php',
 'InvalidUserNameException' => 'Domain/Exceptions/InvalidUserNameException.php',
 'InvalidUserPasswordException' => 'Domain/Exceptions/InvalidUserPasswordException.php', 
 'InvalidUserRoleException' => 'Domain/Exceptions/InvalidUserRoleException.php', 
 'InvalidUserStatusException' => 'Domain/Exceptions/InvalidUserStatusException.php', 
 'UserAlreadyExistsException' => 'Domain/Exceptions/UserAlreadyExistsException.php', 
 'UserNotFoundException' => 'Domain/Exceptions/UserNotFoundException.php', 

 'UserRoleEnum' => 'Domain/Enums/UserRoleEnum.php', 
 'UserStatusEnum' => 'Domain/Enums/UserStatusEnum.php',
 
 'UserId' => 'Domain/ValueObjects/UserId.php', 
 'UserName' => 'Domain/ValueObjects/UserName.php', 
 'UserEmail' => 'Domain/ValueObjects/UserEmail.php', 
 'UserPassword' => 'Domain/ValueObjects/UserPassword.php',

 'UserModel' => 'Domain/Models/UserModel.php', 

 'CreateUserUseCase' => 'Application/Ports/In/CreateUserUseCase.php', 
 'UpdateUserUseCase' => 'Application/Ports/In/UpdateUserUseCase.php', 
 'DeleteUserUseCase' => 'Application/Ports/In/DeleteUserUseCase.php', 
 'GetUserByIdUseCase' => 'Application/Ports/In/GetUserByIdUseCase.php', 
 'GetAllUsersUseCase' => 'Application/Ports/In/GetAllUsersUseCase.php', 

  'SaveUserPort' => 'Application/Ports/Out/SaveUserPort.php', 
  'UpdateUserPort' => 'Application/Ports/Out/UpdateUserPort.php', 
  'DeleteUserPort' => 'Application/Ports/Out/DeleteUserPort.php', 
  'GetUserByIdPort' => 'Application/Ports/Out/GetUserByIdPort.php', 
  'GetUserByEmailPort' => 'Application/Ports/Out/GetUserByEmailPort.php', 
  'GetAllUsersPort' => 'Application/Ports/Out/GetAllUsersPort.php', 




  'CreateUserCommand' => 'Application/Services/Dto/Commands/CreateUserCommand.php', 
  'UpdateUserCommand' => 'Application/Services/Dto/Commands/UpdateUserCommand.php', 
  'DeleteUserCommand' => 'Application/Services/Dto/Commands/DeleteUserCommand.php', 
  'GetUserByIdQuery' => 'Application/Services/Dto/Queries/GetUserByIdQuery.php', 
  'GetAllUsersQuery' => 'Application/Services/Dto/Queries/GetAllUsersQuery.php', 

  'UserApplicationMapper' => 'Application/Services/Mappers/UserApplicationMapper.php', 
  'CreateUserService' => 'Application/Services/CreateUserService.php', 
  'UpdateUserService' => 'Application/Services/UpdateUserService.php', 
  'DeleteUserService' => 'Application/Services/DeleteUserService.php', 
  'GetUserByIdService' => 'Application/Services/GetUserByIdService.php', 
  'GetAllUsersService' => 'Application/Services/GetAllUsersService.php', 

 'Connection' => 'Infraestructure/Adapters/Persistence/MySQL/Config/Connection.php', 
 'UserPersistenceDto' => '  Infraestructure/Adapters/Persistence/MySQL/Dto/UserPersistenceDto.php', 
 'UserEntity' => 'Infraestructure/Adapters/Persistence/MySQL/Entity/UserEntity.php', 
 'UserPersistenceMapper' => 'Infraestructure/Adapters/Persistence/MySQL/Mapper/UserPersistenceMapper.php', 'UserRepositoryMySQL' => 'Infraestructure/Adapters/Persistence/MySQL/Repository/UserRepositoryMySQL.php', 


 'CreateUserWebRequest' => 'Infraestructure/Entrypoints/Web/Controllers/Dto/CreateUserRequest.php',
 'UpdateUserWebRequest' => 'Infraestructure/Entrypoints/Web/Controllers/Dto/UpdateUserRequest.php', 
 'UserResponse' => 'Infraestructure/Entrypoints/Web/Controllers/Dto/UserResponse.php', 
 'UserWebMapper' => 'Infraestructure/Entrypoints/Web/Controllers/Mapper/UserWebMapper.php', 
 'UserController' => 'Infraestructure/Entrypoints/Web/Controllers/UserController.php', 
 'WebRoutes' => 'Infraestructure/Entrypoints/Web/Controllers/Config/WebRoutes.php',



'View' => 'Infraestructure/Entrypoints/Web/Presentation/View.php', 
'Flash' => 'Infraestructure/Entrypoints/Web/Presentation/Flash.php', 

 'DependencyInjection' => 'Common/DependencyInjection.php',
 'PaisModel' => 'Domain/Models/PaisModel.php',
 'nombrePais' => 'Domain/ValueObjects/NombrePais.php',
 'PaisInvalidDataExeption' => 'Domain/Exceptions/PaisInvalidDataExeptions.php',

 'paisRepository' => 'Application/Ports/Out/PaisRepository.php',
 'paisService' => 'Application/Services/PaisService.php',

   'PaisEntity' => 'Infraestructure/Adapters/Persistence/MySQL/Entity/PaisEntity.php',
  'PaisPersistenceMapper' => 'Infraestructure/Adapters/Persistence/MySQL/Mapper/PaisPersistenceMapper.php',
  'PaisRepositoryMySQL' => 'Infraestructure/Adapters/Persistence/MySQL/Repository/PaisRepositoryMySQL.php',

  'PaisController' => 'Infraestructure/Entrypoints/Web/Controllers/PaisController.php',
  'PaisWebMapper' => 'Infraestructure/Entrypoints/Web/Controllers/Mapper/PaisWebMapper.php',

  'InvalidCredentialsException'=>'Domain/Exceptions/InvalidCredentialsException.php',
  'LoginUseCase'=>'Application/Ports/In/LoginUseCase.php',
  'LoginCommand'=>'Application/Services/Dto/Commands/LoginCommand.php',
  'LoginService'=>'Application/Services/LoginService.php',
  'LoginWebRequest'=>'Infraestructure/Entrypoints/Web/Controllers/Dto/LoginWebRequest.php',

  'loginUseCase'=>'Application/Ports/In/LoginUseCase.php',
  'loginService'=>'Application/Services/LoginService.php',
  'LoginCommand' => 'Application/Services/Dto/Commands/LoginCommand.php',

 ); 

 public static function register(): void
 { spl_autoload_register(array(self::class, 'loadClass'));

 }
 public static function loadClass(string $className): void 
 { 
 if (!isset(self::$classMap[$className]))  { 
            return; 

 }
 $baseDir = dirname(__DIR__) . DIRECTORY_SEPARATOR; 
 $filePath = $baseDir . self::$classMap[$className]; 

 if (!file_exists($filePath)) { 
 throw new RuntimeException( 'Archivo no encontrado para la clase ' . $className . ' en: ' . $filePath 
 );

    }
    require_once $filePath;

    }


}

