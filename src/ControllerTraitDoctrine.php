<?php

declare(strict_types=1);

namespace Chebur\ControllerTraits;

use Doctrine\Common\Persistence\ManagerRegistry as DeprecatedManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager as DeprecatedObjectManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;

trait ControllerTraitDoctrine
{
    /**
     * @var DeprecatedManagerRegistry|ManagerRegistry
     */
    private $traitDoctrine;

    /**
     * @internal
     * @required
     */
    public function setTraitDoctrine(DeprecatedManagerRegistry $traitDoctrine) : void
    {
        $this->traitDoctrine = $traitDoctrine;
    }

    /**
     * @return ObjectManager|DeprecatedObjectManager|EntityManagerInterface|EntityManager
     */
    protected function getEntityManager(?string $name = null): DeprecatedObjectManager
    {
        return $this->traitDoctrine->getManager($name);
    }
}
