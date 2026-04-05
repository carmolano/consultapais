<?php


declare(strict_types=1);

final class DeleteUserCommand

{

   private string $id;

   public function ___construct(string $id)

          {
            $this->id = trim($id);
          }

          
          public function getId(): string { return $this->id;}


}