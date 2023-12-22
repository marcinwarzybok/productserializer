<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Serializer;

use App\Shared\Model\ValueObject;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class SymfonyValueObjectNormalizer implements NormalizerInterface
{
    public function normalize(
        mixed $object,
        string $format = null,
        array $context = []
    ): float|int|bool|\ArrayObject|array|string|null {
        return $object->value();
    }

    public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
    {
        return $data instanceof ValueObject;
    }

    public function getSupportedTypes(?string $format): array
    {
        return ['object' => __CLASS__ === static::class];
    }
}
