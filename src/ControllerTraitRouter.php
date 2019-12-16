<?php

declare(strict_types=1);

namespace Chebur\ControllerTraits;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;

trait ControllerTraitRouter
{
    /**
     * @var RouterInterface
     */
    private $traitRouter;

    /**
     * @internal
     * @required
     */
    public function setTraitRouter(RouterInterface $routerForTrait): void
    {
        $this->traitRouter = $routerForTrait;
    }

    protected function generateUrl(string $route, array $parameters = [], int $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH): string
    {
        return $this->traitRouter->generate($route, $parameters, $referenceType);
    }
}
