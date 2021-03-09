<?php

namespace SoureCode\Component\Token\Tests\Checker;

use Doctrine\Persistence\ObjectRepository;
use PHPUnit\Framework\TestCase;
use SoureCode\Component\Token\Checker\TokenUniqueChecker;

class TokenUniqueCheckerTest extends TestCase
{
    public function testIsUniqueExist(): void
    {
        // Arrange
        $repository = $this->createMock(ObjectRepository::class);
        $repository->method('findOneBy')->willReturn('bar');
        $checker = new TokenUniqueChecker($repository);

        // Act
        $actual = $checker->isUnique('foo');

        // Assert
        self::assertFalse($actual);
    }

    public function testIsUniqueNotExist(): void
    {
        // Arrange
        $repository = $this->createMock(ObjectRepository::class);
        $repository->method('findOneBy')->willReturn(null);
        $checker = new TokenUniqueChecker($repository);

        // Act
        $actual = $checker->isUnique('foo');

        // Assert
        self::assertTrue($actual);
    }
}
