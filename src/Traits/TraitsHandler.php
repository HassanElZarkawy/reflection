<?php

namespace Reflection\Traits;


trait TraitsHandler
{
    private array $cachedTraits = [];

    /**
     * Checks if T uses a specific trait
     * @param string $trait
     * @return bool
     */
    public function uses(string $trait): bool
    {
        if (count($this->cachedTraits) === 0) {
            $this->cachedTraits = $this->ref->getTraits();
        }
        // Check if this class directly uses this trait
        $directlyUses = in_array($trait, array_keys($this->cachedTraits));
        if ($directlyUses) {
            return true;
        }

        // at this point, the class doesn't use this trait. Let's check if any of its parent classes does
        $currentParent = $this->ref->getParentClass();
        while ($currentParent !== false) {
            $parentTraits = $currentParent->getTraits();
            if (in_array($trait, array_keys($parentTraits))) {
                return true;
            }
            $currentParent = $currentParent->getParentClass();
        }
        return false;
    }

    public function usesAny(array $traits): bool
    {
        foreach ($traits as $trait) {
            if ($this->uses($trait)) {
                return true;
            }
        }
        return false;
    }
}