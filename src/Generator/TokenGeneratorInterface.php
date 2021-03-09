<?php

namespace SoureCode\Component\Token\Generator;

interface TokenGeneratorInterface
{
    public function generate(int $length): string;
}
