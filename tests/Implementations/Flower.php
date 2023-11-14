<?php

namespace Tests\Implementations;

use Tests\Attributes\HasLeafs;
use Tests\Interfaces\IFlower;

#[HasLeafs(6)]
class Flower extends Plant implements IFlower
{

}