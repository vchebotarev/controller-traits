<?php

declare(strict_types=1);

namespace Chebur\ControllerTraits;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;

trait SerializerJms
{
    /**
     * @var SerializerInterface
     */
    private $traitSerializerJms;

    /**
     * @required
     * @internal
     */
    public function setTraitSerializerJms(SerializerInterface $traitSerializerJms) : void
    {
        $this->traitSerializerJms = $traitSerializerJms;
    }

    public function serialize($data, string $format, ?SerializationContext $context = null, ?string $type = null): string
    {
        return $this->traitSerializerJms->serialize($data, $format, $context, $type);
    }

    public function deserialize(string $data, string $type, string $format, ?DeserializationContext $context = null)
    {
        return $this->traitSerializerJms->deserialize($data, $type, $format, $context);
    }
}
