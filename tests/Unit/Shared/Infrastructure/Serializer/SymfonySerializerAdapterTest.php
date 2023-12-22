<?php

declare(strict_types=1);

namespace App\Tests\Unit\Shared\Infrastructure\Serializer;

use App\Shared\Application\Features\Serialize\Format;
use App\Shared\Infrastructure\Serializer\SymfonySerializerAdapter;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\SerializerInterface;

class SymfonySerializerAdapterTest extends TestCase
{
    /**
    * @test
    */
    public function it_should_use_symfony_serializer_for_serialize(): void
    {
        $symfonySerializer = $this->createMock(SerializerInterface::class);
        $data = [new \stdClass()];
        $testedClass = new SymfonySerializerAdapter($symfonySerializer);

        $symfonySerializer
            ->expects(self::once())
            ->method('serialize')
            ->with(self::equalTo($data), 'xml');

        $testedClass->execute(Format::XML, $data);
    }
}
