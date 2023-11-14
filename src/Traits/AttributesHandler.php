<?php

namespace Reflection\Traits;

use loophp\collection\Collection;
use Reflection\Attribute;
use Reflection\Interfaces\IAttribute;
use ReflectionAttribute;

trait AttributesHandler
{
    /**
     * @return IAttribute[]
     */
    public function attributes(): array
    {
        $attribute =  $this->ref->getAttributes();
        return Collection::fromIterable($attribute)
            ->map(callback: fn (ReflectionAttribute $item) => new Attribute(
                $item->getName(),
                $item->getArguments(),
                $item->getTarget(),
                $item->isRepeated(),
                $item->newInstance(),
            ))
            ->all();
    }

    /**
     * @param string $class
     * @return bool
     */
    public function isDecoratedBy(string $class): bool
    {
        return current(
            array_filter(
                $this->attributes(),
                fn (IAttribute $attr) => $attr->name() === $class
            )
        ) !== false;
    }
}