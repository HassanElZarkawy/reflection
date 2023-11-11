<?php

namespace Reflection\Interfaces;

/**
 * @template T
 */
interface IAttribute
{
    /**
     * @return string
     */
    public function name(): string;

    /**
     * @return array
     */
    public function arguments(): array;

    /**
     * @return string
     */
    public function target(): string;

    /**
     * @return bool
     */
    public function isRepeated(): bool;

    /**
     * @return T
     */
    public function instance();
}