<?php

declare(strict_types=1);

namespace Chebur\ControllerTraits;

use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

trait Form
{
    /**
     * @var FormFactoryInterface
     */
    private $traitFormFactory;

    /**
     * @internal
     * @required
     */
    public function setTraitFormFactory(FormFactoryInterface $traitFormFactory) : void
    {
        $this->traitFormFactory = $traitFormFactory;
    }

    protected function createForm(string $type, $data = null, array $options = []): FormInterface
    {
        return $this->traitFormFactory->create($type, $data, $options);
    }

    protected function createFormBuilder($data = null, array $options = []): FormBuilderInterface
    {
        return $this->traitFormFactory->createBuilder(FormType::class, $data, $options);
    }
}
