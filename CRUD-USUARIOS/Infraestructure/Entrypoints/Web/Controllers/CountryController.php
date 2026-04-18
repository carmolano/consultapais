<?php
declare(strict_types=1);

// Importamos los mappers y casos de uso de Países (Asegúrate de crearlos o renombrarlos)
require_once __DIR__ . '/Mapper/CountryWebMapper.php'; 
require_once __DIR__ . '/../../../../Application/Ports/In/CreateCountryUseCase.php'; 
require_once __DIR__ . '/../../../../Application/Ports/In/UpdateCountryUseCase.php'; 
require_once __DIR__ . '/../../../../Application/Ports/In/GetCountryByIdUseCase.php'; 
require_once __DIR__ . '/../../../../Application/Ports/In/GetAllCountriesUseCase.php'; 
require_once __DIR__ . '/../../../../Application/Ports/In/DeleteCountryUseCase.php';

require_once __DIR__ . '/../../../../Application/Services/Dto/Queries/GetAllCountriesQuery.php'; 

final class CountryController 
{ 
    private CreateCountryUseCase $createCountryUseCase; 
    private UpdateCountryUseCase $updateCountryUseCase; 
    private GetCountryByIdUseCase $getCountryByIdUseCase; 
    private GetAllCountriesUseCase $getAllCountriesUseCase; 
    private DeleteCountryUseCase $deleteCountryUseCase; 
    private CountryWebMapper $mapper; 

    public function __construct( 
        CreateCountryUseCase $createCountryUseCase, 
        UpdateCountryUseCase $updateCountryUseCase, 
        GetCountryByIdUseCase $getCountryByIdUseCase, 
        GetAllCountriesUseCase $getAllCountriesUseCase, 
        DeleteCountryUseCase $deleteCountryUseCase, 
        CountryWebMapper $mapper 
    ) { 
        $this->createCountryUseCase = $createCountryUseCase; 
        $this->updateCountryUseCase = $updateCountryUseCase; 
        $this->getCountryByIdUseCase = $getCountryByIdUseCase; 
        $this->getAllCountriesUseCase = $getAllCountriesUseCase; 
        $this->deleteCountryUseCase = $deleteCountryUseCase; 
        $this->mapper = $mapper; 
    } 
        
        
        public function index(): array 
        
        { 
            $countries = $this->getAllCountriesUseCase->execute(new GetAllCountriesQuery()); 
            
            return $this->mapper->fromModelsToResponse($countries);
                   
                   
        } 
        
        
        
        public function show(string $id): UserResponse 
        
           { 
            
            $query = $this->mapper->fromIdToGetByIdQuery($id);
        $country = $this->getCountryByIdUseCase->execute($query); 
        return $this->mapper->fromModelToResponse($country);
            }
             
             
            public function store(CreateCountryWebRequest $request): CountryResponse 
    {
        // Aquí es donde procesas los 10 campos (Nombre, Presidente, etc.)
        $command = $this->mapper->fromCreateRequestToCommand($request); 
        $country = $this->createCountryUseCase->execute($command); 
        return $this->mapper->fromModelToResponse($country); 
    } 

    public function update(UpdateCountryWebRequest $request): CountryResponse 
    { 
        $command = $this->mapper->fromUpdateRequestToCommand($request); 
        $country = $this->updateCountryUseCase->execute($command); 
        return $this->mapper->fromModelToResponse($country); 
    } 

    public function delete(string $id): void 
    { 
        $command = $this->mapper->fromIdToDeleteCommand($id); 
        $this->deleteCountryUseCase->execute($command); 
    } 
}        
     
             
             
        