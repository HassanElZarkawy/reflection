<?php

namespace Reflection\Traits;

trait ExtendsHandler
{
    public function extends(string $class): bool
    {
        return $this->ref->isSubclassOf($class);
    }

    public function extendsAny(array $classes): bool
    {
        foreach ($classes as $class) {
            if ($this->extends($class)) {
                return true;
            }
        }
        return false;
    }
}