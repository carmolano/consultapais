<?php

declare(strict_types=1);

require_once __DIR__ . '/../../Services/Dto/Queries/GetALLCountryUsersQuery.php';
require_once __DIR__ . '/../../../Domain/Models/CountryModel.php';


interface GetALLCountryUsersUseCase

{
    public function execute(GetALLCountryUsersUseCase $query): array;

}