<?php

namespace Tests\Implementations;

use Tests\Interfaces\IAnimal;

class Animal implements IAnimal
{
    public function canBreath(): bool
    {
        return true;
    }
}