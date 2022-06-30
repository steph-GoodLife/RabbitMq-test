<?php

namespace App\Service\Serializer;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class DTOSerializer implements SerializerInterface
{
    private SerializerInterface $serializer;

    public function __construct()
    {
        $this->serialize = new Serializer(
            //normalizer
            [new ObjectNormalizer(nameConverter: new CamelCaseToSnakeCaseNameConverter())],
            //encoders
            [new JsonEncode()]
        );
    }

    public function serialize(mixed $data, string $format, array $context = []): string
    {
        return $this->serialize->serialize($data, $format, $context);
    }

    public function deserialize(mixed $data, string $type , string $format, array $context = []): mixed
    {
        return $this->serialize->deserialize($data, $type, $format, $context);
    }


}