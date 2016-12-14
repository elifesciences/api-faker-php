<?php

namespace test\eLife\ApiFaker;

use eLife\ApiFaker\Factory;
use Faker\Generator;

final class FactoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates_a_faker()
    {
        $this->assertInstanceOf(Generator::class, Factory::create());
    }
}
