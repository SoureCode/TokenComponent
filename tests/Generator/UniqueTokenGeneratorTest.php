<?php

namespace SoureCode\Component\Token\Tests\Generator;

use PHPUnit\Framework\TestCase;
use SoureCode\Component\Common\Generator\RandomGenerator;
use SoureCode\Component\Token\Checker\TokenUniqueChecker;
use SoureCode\Component\Token\Generator\TokenGenerator;
use SoureCode\Component\Token\Generator\UniqueTokenGenerator;
use function strlen;

class UniqueTokenGeneratorTest extends TestCase
{
    public function testGenerate(): void
    {
        // Arrange
        $tokenUniqueChecker = $this->createMock(TokenUniqueChecker::class);
        $tokenUniqueChecker->method('isUnique')->willReturn(true);
        $tokenGenerator = $this->createMock(TokenGenerator::class);
        $tokenGenerator->method('generate')->willReturn('bar');
        $uniqueTokenGenerator = new UniqueTokenGenerator($tokenGenerator, $tokenUniqueChecker);

        // Act
        $actual = $uniqueTokenGenerator->generate(3);

        // Expect
        self::assertSame('bar', $actual);
    }

    public function testGenerateLength(): void
    {
        // Arrange
        $tokenUniqueChecker = $this->createMock(TokenUniqueChecker::class);
        $tokenUniqueChecker->method('isUnique')->willReturn(true);
        $randomGenerator = new RandomGenerator();
        $tokenGenerator = new TokenGenerator($randomGenerator);
        $tokenGenerator = new UniqueTokenGenerator($tokenGenerator, $tokenUniqueChecker);

        // Act
        $actual = $tokenGenerator->generate(5);

        // Expect
        self::assertSame(5, strlen($actual));
    }
}
