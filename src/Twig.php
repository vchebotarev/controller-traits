<?php

declare(strict_types=1);

namespace Chebur\ControllerTraits;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

trait Twig
{
    /**
     * @var Environment
     */
    private $traitTwig;

    /**
     * @required
     * @internal
     */
    public function setTraitTwig(Environment $twigForTrait): void
    {
        $this->traitTwig = $twigForTrait;
    }

    protected function render(string $view, array $parameters = [], Response $response = null): Response
    {
        $content = $this->traitTwig->render($view, $parameters);
        if (null === $response) {
            $response = new Response();
        }
        $response->setContent($content);
        return $response;
    }
}
