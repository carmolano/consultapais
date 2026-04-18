<?php


declare(strict_types=1);

require_once __DIR__ . '/../../Services/Dto/Commands/CreateUserCommand.php';
require_once __DIR__ . '/../../../Domain/Models/UserModel.php';


interface CreateCountryUserUseCase

{
    public function execute(CreateCountryUserUseCase $command): UserModel;
}