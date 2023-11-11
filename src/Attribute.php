<?php

namespace Reflection;

use Reflection\Interfaces\IAttribute;

/**
 * @template T
 * @implements IAttribute<T>
 */
class Attribute implements IAttribute
{
    public function __construct(
        /**
         * @var string
         */
        private readonly string $name,
        /**
         * @var array
         */
        private readonly array $arguments,
        /**
         * @var string
         */
        private readonly string $target,
        /**
         * @var bool
         */
        private readonly bool $isRepeated,
        /**
         * @var T
         */
        private readonly mixed $instance,
    )
    {

    }

    public function name(): string
    {
        return $this->name;
    }

    public function arguments(): array
    {
        return $this->arguments;
    }

    public function target(): string
    {
        return $this->target;
    }

    public function isRepeated(): bool
    {
        return $this->isRepeated;
    }

    public function instance()
    {
        return $this->instance;
    }
}