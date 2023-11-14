<?php

namespace Tests\Attributes;

use Attribute;

#[Attribute]
class Color
{
    private readonly string $color;

    public function __construct(string $color)
    {
        $this->color = $color;
    }
}