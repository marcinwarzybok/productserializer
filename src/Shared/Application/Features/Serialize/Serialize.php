<?php

declare(strict_types=1);

namespace App\Shared\Application\Features\Serialize;

final class Serialize
{
    private Serializer $serializer;

    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param Format $format
     * @param mixed[] $data array of objects for serialize
     * @return string
     */
    public function execute(Format $format, array $data): string
    {
        return $this->serializer->execute($format, $data);
    }
}
