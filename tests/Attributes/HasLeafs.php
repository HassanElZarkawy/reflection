<?php

namespace Tests\Attributes;

use Attribute;

#[Attribute]
class HasLeafs
{
    private readonly int $leafs;

    public function __construct(int $leafs)
    {
        $this->leafs = $leafs;
    }
}