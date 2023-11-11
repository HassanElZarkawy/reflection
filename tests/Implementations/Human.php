<?php

namespace Tests\Implementations;

use Tests\Interfaces\IHuman;

class Human implements IHuman
{
    public function canBreath(): bool
    {
        return true;
    }
}