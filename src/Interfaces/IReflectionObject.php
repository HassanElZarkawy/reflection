<?php

namespace Reflection\Interfaces;

/**
 * @template T
 */
interface IReflectionObject
{
    /**
     * @param string $class
     * @return IReflectionObject<T>
     */
    public static function of(string $class): IReflectionObject;

    /**
     * @return T|null
     */
    public function instantiate(array $args = []);

    /**
     * @param string $class
     * @return bool
     */
    public function is(string $class): bool;

    /**
     * Checks if T uses a V
     * @template V
     * @param class-string<V> $trait
     * @return bool
     * @uses \ReflectionClass
     */
    public function uses(string $trait): bool;

    /**
     * @param array $traits
     * @return bool
     */
    public function usesAny(array $traits): bool;

    /**
     * @param string $class
     * @return bool
     */
    public function extends(string $class): bool;

    /**
     * @param array $classes
     * @return bool
     */
    public function extendsAny(array $classes): bool;

    /**
     * @param string $interface
     * @return bool
     */
    public function implements(string $interface): bool;

    /**
     * @param array $interfaces
     * @return bool
     */
    public function implementsAny(array $interfaces): bool;

    /**
     * @param string $propertyName
     * @return bool
     */
    public function hasProperty(string $propertyName): bool;

    /**
     * @param string $functionName
     * @return bool
     */
    public function hasFunction(string $functionName): bool;

    /**
     * @param string $functionName
     * @param array $arguments
     * @param array $constructorArgs
     * @return mixed
     */
    public function callFunction(string $functionName, array $arguments = [], array $constructorArgs = []);

    public function attributes(): array;
}