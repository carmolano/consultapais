<?php


declare(strict_types=1);


require_once __DIR__ . '/../../Services/Dto/Commands/UpdateUserCommand.php'; 
require_once __DIR__ . '/../../../Domain/Models/UserModel.php';

interface UpdateCountryUserUseCase
{
    public function execute(UpdateCountryUserUseCase $command): UserModel;
}