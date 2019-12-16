<?php

declare(strict_types=1);

namespace Chebur\ControllerTraits;

use Symfony\Component\Serializer\SerializerInterface;

trait ControllerTraitSerializer
{
    /**
     * @var SerializerInterface
     */
    private $traitSerializer;

    /**
     * @required
     * @internal
     */
    public function setTraitSerializer(SerializerInterface $traitSerializer) : void
    {
        $this->traitSerializer = $traitSerializer;
    }

    public function serialize($data, $format, array $context = []): string
    {
        return $this->traitSerializer->serialize($data, $format, $context);
    }

    public function deserialize($data, $type, $format, array $context = [])
    {
        return $this->traitSerializer->deserialize($data, $type, $format, $context);
    }
}
