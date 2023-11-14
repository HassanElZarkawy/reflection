<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Reflection\ReflectionObject;
use ReflectionException;
use Tests\Implementations\Flower;
use Tests\Interfaces\IFlower;
use Tests\Interfaces\ILivingBeing;
use Tests\Interfaces\IPlant;

class ImplementTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImplements()
    {
        $reflector = ReflectionObject::of(Flower::class);

        $this->assertTrue($reflector->implements(IFlower::class));
        $this->assertTrue($reflector->implementsAny([IFlower::class]));
    }

    /**
     * @throws ReflectionException
     */
    public function testImplementsThroughParent()
    {
        $reflector = ReflectionObject::of(Flower::class);

        $this->assertTrue($reflector->implements(ILivingBeing::class));
        $this->assertTrue($reflector->implementsAny([ILivingBeing::class]));

        $this->assertTrue($reflector->implements(IPlant::class));
        $this->assertTrue($reflector->implementsAny([IPlant::class]));
    }

    /**
     * @throws ReflectionException
     */
    public function testIfIsWorksWithImplements()
    {
        $reflector = ReflectionObject::of(Flower::class);

        $this->assertTrue($reflector->is(IFlower::class));
        $this->assertTrue($reflector->is(IPlant::class));
    }
}