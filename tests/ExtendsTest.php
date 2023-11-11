<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Reflection\ReflectionObject;
use ReflectionException;
use Tests\Implementations\Flower;
use Tests\Implementations\Human;
use Tests\Implementations\Plant;
use Tests\Interfaces\IHuman;
use Tests\Interfaces\ILivingBeing;
use Tests\Interfaces\IPlant;

class ExtendsTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testIfExtendsReturnsCorrectType()
    {
        $reflector = ReflectionObject::of(Human::class);

        // Tests if we can detect first level inheritance
        $this->assertTrue($reflector->extends(IHuman::class));

        // test if we can detect n level inheritance
        $this->assertTrue($reflector->extends(ILivingBeing::class));
    }

    /**
     * @throws ReflectionException
     */
    public function testIfParentInheritanceIsDetectable()
    {
        $reflector = ReflectionObject::of(Flower::class);

        $this->assertTrue($reflector->extends(Plant::class));
        $this->assertTrue($reflector->extendsAny([Plant::class]));

        $this->assertTrue($reflector->extends(IPlant::class));
        $this->assertTrue($reflector->extendsAny([Plant::class]));
    }
}