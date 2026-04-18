<?php

declare(strict_types=1);

final class Country
{
    private string $name;
    private string $capital;
    private int $population;
    private string $continent;

    public function __construct(string $name, string $capital, int $population, string $continent)
    {
        $this->name = $name;
        $this->capital = $capital;
        $this->population = $population;
        $this->continent = $continent;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCapital(): string
    {
        return $this->capital;
    }

    public function getPopulation(): int
    {
        return $this->population;
    }

    public function getContinent(): string
    {
        return $this->continent;
    }
}