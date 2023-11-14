<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Reflection\Interfaces\IAttribute;
use Reflection\ReflectionObject;
use ReflectionException;
use Tests\Attributes\HasLeafs;
use Tests\Implementations\Flower;

class AttributesTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testIfAttributesAreDetected()
    {
        $reflector = ReflectionObject::of(Flower::class);

        /** @var IAttribute[] $attributes */
        $attributes = $reflector->attributes();
        $attributeNames = array_map(fn (IAttribute $attribute) => $attribute->name(), $attributes);

        $this->assertTrue(
            in_array(
                HasLeafs::class,
                array_values($attributeNames)
            )
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testIsDecoratedByPicksTheCorrectAttributes()
    {
        $reflector = ReflectionObject::of(Flower::class);
        var_dump($reflector->attributes()); die();
        $this->assertTrue($reflector->isDecoratedBy(HasLeafs::class));
    }
}