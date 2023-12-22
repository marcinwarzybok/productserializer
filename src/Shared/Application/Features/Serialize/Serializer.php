<?php

declare(strict_types=1);

namespace App\Shared\Application\Features\Serialize;

interface Serializer
{
    /**
     * @param Format $format
     * @param mixed[] $data array of objects for serialize
     * @return string
     */
    public function execute(Format $format, array $data): string;
}
