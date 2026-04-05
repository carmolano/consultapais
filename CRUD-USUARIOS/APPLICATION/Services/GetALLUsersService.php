<?php


declare(strict_types=1);



require_once __DIR__ . '/../Ports/In/GetAllUsersUseCase.php'; 
require_once __DIR__ . '/../Ports/Out/GetAllUsersPort.php';


final class GetALLUsersService implements GetALLUsersUseCase
{

private GetALLUsersport $getALLUsersPort;


public function __construct(GetAllUsersPort $getAllUsersPort)

 {

                $this->getALLUsersPort = $getAllUsersPort;  

             
}
             
 public function execute(GetALLUsersQuery $query): array 

  {
    return $this->getALLUsersPort->getALL();
  }

}