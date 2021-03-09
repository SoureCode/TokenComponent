<?php

namespace SoureCode\Component\Token\Checker;

use Doctrine\Persistence\ObjectRepository;
use SoureCode\Component\Token\Model\TokenInterface;

class TokenUniqueChecker implements TokenUniqueCheckerInterface
{
    /**
     * @var ObjectRepository<TokenInterface>
     */
    protected ObjectRepository $repository;

    /**
     * @param ObjectRepository<TokenInterface> $repository
     */
    public function __construct(ObjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function isUnique(string $value): bool
    {
        return null === $this->repository->findOneBy(['value' => $value]);
    }
}
