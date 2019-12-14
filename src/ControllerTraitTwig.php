<?php

declare(strict_types=1);

namespace Chebur\ControllerTraits;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

trait ControllerTraitTwig
{
    /**
     * @var Environment
     */
    protected $twig;

    /**
     * @required
     */
    public function setTwig(Environment $twig): void
    {
        $this->twig = $twig;
    }

    protected function render(string $view, array $parameters = [], Response $response = null): Response
    {
        $content = $this->twig->render($view, $parameters);
        if (null === $response) {
            $response = new Response();
        }
        $response->setContent($content);
        return $response;
    }
}
