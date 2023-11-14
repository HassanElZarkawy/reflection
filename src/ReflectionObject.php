<?php

namespace Reflection;

use Reflection\Interfaces\IReflectionObject;
use Reflection\Traits\AttributesHandler;
use Reflection\Traits\ExtendsHandler;
use Reflection\Traits\ImplementsHandler;
use Reflection\Traits\SearchesForFunctions;
use Reflection\Traits\SearchesForProperties;
use Reflection\Traits\TraitsHandler;
use ReflectionClass;
use ReflectionException;
use Throwable;

/**
 * @template T
 * @implements IReflectionObject<T>
 */
class ReflectionObject implements IReflectionObject
{
    use TraitsHandler,
        ExtendsHandler,
        ImplementsHandler,
        SearchesForProperties,
        SearchesForFunctions,
        AttributesHandler;

    /**
     * @var T
     */
    private $class;

    /**
     * @var ReflectionClass
     */
    private ReflectionClass $ref;

    /**
     * @param T $class
     * @throws ReflectionException
     */
    private function __construct($class)
    {
        $this->class = $class;
        $this->ref = new ReflectionClass($this->class);
    }

    /**
     * @param T $class
     * @return IReflectionObject<T>
     * @throws ReflectionException
     */
    public static function of($class): IReflectionObject
    {
        return new self($class);
    }

    public function is(string $class): bool
    {
        return $this->extends($class) || $this->uses($class) || $this->implements($class);
    }

    /**
     * @return null|T
     */
    public function instantiate(array $args = [])
    {
        if ($this->ref->isInterface()) {
            return null;
        }

        try {
            return $this->ref->newInstanceArgs($args);
        } catch (Throwable $exception) {
            return null;
        }
    }


}
