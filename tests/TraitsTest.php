<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Reflection\ReflectionObject;
use ReflectionException;
use Tests\Implementations\Human;
use Tests\Implementations\Person;
use Tests\Traits\Speakable;

class TraitsTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testIfTraitsVisibleDirectlyOnClass()
    {
        $reflector = ReflectionObject::of(Human::class);

        $this->assertTrue($reflector->uses(Speakable::class));
        $this->assertTrue($reflector->usesAny([Speakable::class]));
    }

    /**
     * @throws ReflectionException
     */
    public function testIfTraitsVisibleOnClassParents()
    {
        $reflector = ReflectionObject::of(Person::class);

        $this->assertTrue($reflector->uses(Speakable::class));
        $this->assertTrue($reflector->usesAny([Speakable::class]));
    }

    /**
     * @throws ReflectionException
     */
    public function testIfIsWorkingWithTraits()
    {
        $reflector = ReflectionObject::of(Person::class);

        $this->assertTrue($reflector->is(Human::class));
        $this->assertTrue($reflector->is(Speakable::class));
    }
}