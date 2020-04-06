<?php

declare(strict_types=1);

namespace Chebur\ControllerTraits;

use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

trait Validator
{
    /**
     * @var ValidatorInterface
     */
    private $traitValidator;

    /**
     * @required
     * @internal
     */
    public function setTraitValidator(ValidatorInterface $traitValidator) : void
    {
        $this->traitValidator = $traitValidator;
    }

    public function validate($value, $constraints = null, $groups = null): ConstraintViolationListInterface
    {
        return $this->traitValidator->validate($value, $constraints, $groups);
    }
}
