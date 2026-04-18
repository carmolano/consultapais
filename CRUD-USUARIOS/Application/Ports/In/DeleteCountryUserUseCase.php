<?php


declare(strict_types=1);


require_once __DIR__ . '/../../Services/Dto/Commands/DeleteUserCommand.php';


interface DeleteCountryUserUseCase

{
    public function execute(DeleteUserCommand $command): void;
}