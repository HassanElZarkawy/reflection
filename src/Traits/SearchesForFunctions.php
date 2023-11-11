<?php

namespace Reflection\Traits;

trait SearchesForFunctions
{
    public function hasFunction(string $functionName): bool
    {
        return $this->ref->hasMethod($functionName);
    }

    public function callFunction(string $functionName, array $arguments = [], array $constructorsArgs = [])
    {
        if ($this->hasFunction($functionName)) {
            return call_user_func_array([ $this->instantiate($constructorsArgs), $functionName ], $arguments);
        }
        return null;
    }
}