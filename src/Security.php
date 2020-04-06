<?php

declare(strict_types=1);

namespace Chebur\ControllerTraits;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

trait Security
{
    /**
     * @var TokenStorageInterface
     */
    private $traitTokenStorage;

    /**
     * @var AuthorizationCheckerInterface
     */
    private $traitAuthorizationChecker;

    /**
     * @internal
     * @required
     */
    public function setTraitSecurityDependencies(
        TokenStorageInterface $tokenStorage,
        AuthorizationCheckerInterface $authorizationChecker
    ): void {
        $this->traitTokenStorage = $tokenStorage;
        $this->traitAuthorizationChecker = $authorizationChecker;
    }

    protected function isGranted($attributes, $subject = null): bool
    {
        return $this->traitAuthorizationChecker->isGranted($attributes, $subject);
    }

    protected function getUser()
    {
        if (null === $token = $this->traitTokenStorage->getToken()) {
            return null;
        }
        if (!\is_object($user = $token->getUser())) {
            // e.g. anonymous authentication
            return null;
        }
        return $user;
    }
}
