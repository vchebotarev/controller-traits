<?php

declare(strict_types=1);

namespace Chebur\ControllerTraits;

use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

trait ControllerTraitForm
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @required
     */
    public function setFormFactory(FormFactoryInterface $formFactory) : void
    {
        $this->formFactory = $formFactory;
    }

    protected function createForm(string $type, $data = null, array $options = array()): FormInterface
    {
        return $this->formFactory->create($type, $data, $options);
    }

    protected function createFormBuilder($data = null, array $options = array()): FormBuilderInterface
    {
        return $this->formFactory->createBuilder(FormType::class, $data, $options);
    }
}
