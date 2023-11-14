<?php

namespace Tests\Attributes;

use Attribute;

#[Attribute]
class HasArms
{
    private readonly int $arms;

    public function __construct(int $numberOfArms)
    {
        $this->arms = $numberOfArms;
    }
}