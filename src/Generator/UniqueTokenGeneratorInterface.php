<?php

namespace SoureCode\Component\Token\Generator;

interface UniqueTokenGeneratorInterface
{
    public function generate(int $length): string;
}
