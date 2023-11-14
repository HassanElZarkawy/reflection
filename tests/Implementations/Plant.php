<?php

namespace Tests\Implementations;

use Tests\Attributes\Color;
use Tests\Interfaces\IPlant;

#[Color("Green")]
class Plant implements IPlant
{
    public function canBreath(): bool
    {
        return false;
    }
}