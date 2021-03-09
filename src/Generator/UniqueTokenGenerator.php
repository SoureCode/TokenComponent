<?php

namespace SoureCode\Component\Token\Generator;

use SoureCode\Component\Token\Checker\TokenUniqueCheckerInterface;

class UniqueTokenGenerator implements UniqueTokenGeneratorInterface
{
    protected TokenGeneratorInterface $tokenGenerator;

    protected TokenUniqueCheckerInterface $tokenUniqueChecker;

    public function __construct(TokenGeneratorInterface $tokenGenerator, TokenUniqueCheckerInterface $tokenUniqueChecker)
    {
        $this->tokenGenerator = $tokenGenerator;
        $this->tokenUniqueChecker = $tokenUniqueChecker;
    }

    public function generate(int $length): string
    {
        do {
            $token = $this->tokenGenerator->generate($length);
        } while (!$this->tokenUniqueChecker->isUnique($token));

        return $token;
    }
}
