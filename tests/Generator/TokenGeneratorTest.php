<?php

namespace SoureCode\Component\Token\Tests\Generator;

use PHPUnit\Framework\TestCase;
use SoureCode\Component\Common\Generator\RandomGenerator;
use SoureCode\Component\Token\Generator\TokenGenerator;

class TokenGeneratorTest extends TestCase
{
    public function testGenerate(): void
    {
        // Arrange
        $randomGenerator = $this->createMock(RandomGenerator::class);
        $randomGenerator->method('generateString')->willReturn('foo');
        $tokenGenerator = new TokenGenerator($randomGenerator);

        // Act
        $actual = $tokenGenerator->generate(3);

        // Assert
        self::assertSame('foo', $actual);
    }
}
