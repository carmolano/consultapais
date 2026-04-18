<?php

declare(strict_types=1);

final class Country
{
    public function __construct(
        public string $nombre,
        public string $presidente,
        public string $continente,
        public string $nombreHimno,
        public int $numeroHabitantes,
        public int $numDepartamentos,
        public int $numMunicipios,
        public string $idiomaOficial,
        public int $numUniversidades,
        public string $topoDemocracia,

    ) {}
}