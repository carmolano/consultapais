<?php

declare(strict_types=1);    

final class CreatCountryWebRequest
{
    public function __construct(
        private string $nombre,
        private string $presidente,
        private string$continente,
        private string $nombreHimno,
        private int $numeroHabitantes,
        private int $numDepartamentos,
        private int $numMunicipios,
        private string $idiomaOficial,
        private int $numUniversidades,
        private string $topoDemocracia,

    ) {}

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getPresidente(): string
    {
        return $this->presidente;
    }

    public function getContinente(): string
    {
        return $this->continente;
    }

    public function getNombreHimno(): string
    {
        return $this->nombreHimno;
    }

    public function getNumeroHabitantes(): int
    {
        return $this->numeroHabitantes;
    }

    public function getNumDepartamentos(): int
    {
        return $this->numDepartamentos;
    }

    public function getNumMunicipios(): int
    {
        return $this->numMunicipios;
    }

    public function getIdiomaOficial(): string
    {
        return $this->idiomaOficial;
    }

    public function getNumUniversidades(): int
    {
        return $this->numUniversidades;
    }

    public function getTopoDemocracia(): string
    {
        return $this->topoDemocracia;
    }
}