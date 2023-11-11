<?php

namespace Tests\Implementations;

use Tests\Interfaces\IPlant;

class Plant implements IPlant
{
    public function canBreath(): bool
    {
        return false;
    }
}