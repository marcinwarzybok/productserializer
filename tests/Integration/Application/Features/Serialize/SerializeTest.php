<?php

declare(strict_types=1);

namespace App\Tests\Integration\Application\Features\Serialize;

use App\Product\Model\Name;
use App\Product\Model\Product;
use App\Shared\Application\Features\Serialize\Format;
use App\Shared\Application\Features\Serialize\Serialize;
use App\Tests\Unit\Product\TestFixtures\MoneyFixture;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SerializeTest extends KernelTestCase
{
    /**
    * @test
    */
    public function it_should_serialize_products(): void
    {
        $product = new Product(new Name('someName'), MoneyFixture::create());

        self::bootKernel();
        $container = static::getContainer();

        /** @var Serialize $serialize */
        $serialize = $container->get(Serialize::class);

        $result = $serialize->execute(Format::XML, [$product]);

        $expected = <<<EOT
<?xml version="1.0"?>
<response>
  <item key="0">
    <name>someName</name>
    <money>
      <currency>
        <name>PLN</name>
      </currency>
      <price>12312</price>
      <precision>23</precision>
    </money>
  </item>
</response>

EOT;
        self::assertSame($expected, $result);
    }


}
