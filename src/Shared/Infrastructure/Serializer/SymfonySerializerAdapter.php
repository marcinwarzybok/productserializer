<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Serializer;

use App\Shared\Application\Features\Serialize\Format;
use App\Shared\Application\Features\Serialize\Serializer;
use Symfony\Component\Serializer\SerializerInterface as SymfonySerializer;

final class SymfonySerializerAdapter implements Serializer
{
    private SymfonySerializer $serializer;

    public function __construct(SymfonySerializer $serializer)
    {
        $this->serializer = $serializer;
    }

    public function execute(Format $format, array $data): string
    {
        return $this->serializer->serialize($data, strtolower(Format::XML->name), ['xml_format_output' => true]);
    }
}
