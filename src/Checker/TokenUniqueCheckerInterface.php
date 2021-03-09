<?php

namespace SoureCode\Component\Token\Checker;

interface TokenUniqueCheckerInterface
{
    public function isUnique(string $value): bool;
}
