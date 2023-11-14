<?php

namespace Tests\Implementations;

use Tests\Interfaces\IHuman;
use Tests\Traits\Speakable;

class Human implements IHuman
{
    use Speakable;

    public function canBreath(): bool
    {
        return true;
    }
}