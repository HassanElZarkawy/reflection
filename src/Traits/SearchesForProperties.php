<?php

namespace Reflection\Traits;

use ReflectionClass;
use ReflectionException;

trait SearchesForProperties
{
    /**
     * @param string $propertyName
     * @return bool
     * @throws ReflectionException
     */
    public function hasProperty(string $propertyName): bool
    {
        if ($this->ref->hasProperty($propertyName)) {
            return true;
        }

        // check if the property exists on any of the parents, or any traits they're using
        $currentParent = $this->ref->getParentClass();
        while ($currentParent !== false) {
            if ($currentParent->hasProperty($propertyName)) {
                return true;
            }
            foreach ($currentParent->getTraits() as $t) {
                if ($this->traitHasProperty($t->name, $propertyName)) {
                    return true;
                }
            }
            $currentParent = $currentParent->getParentClass();
        }

        // check if the property lives on a trait the class is using
        foreach ($this->ref->getTraits() as $t) {
            if ($this->traitHasProperty($t->name, $propertyName)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @throws ReflectionException
     */
    private function traitHasProperty(string $trait, string $propertyName): bool
    {
        $traitRef = new ReflectionClass($trait);
        return $traitRef->hasProperty($propertyName);
    }
}