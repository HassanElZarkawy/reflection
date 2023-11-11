<?php

namespace Reflection\Traits;

trait ImplementsHandler
{
    public function implements(string $interface): bool
    {
        return $this->ref->implementsInterface($interface);
    }

    public function implementsAny(array $interfaces): bool
    {
        foreach ($interfaces as $interface) {
            if ($this->implements($interface)) {
                return true;
            }
        }
        return false;
    }
}