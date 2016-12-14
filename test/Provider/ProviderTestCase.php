<?php

namespace test\eLife\ApiFaker\Provider;

use eLife\ApiFaker\Factory;
use Faker\Generator;
use test\eLife\ApiFaker\TestCase;

abstract class ProviderTestCase extends TestCase
{
    private $faker;

    /**
     * @before
     */
    final public function setUpFaker()
    {
        $this->faker = Factory::create();
    }

    final protected function getFaker() : Generator
    {
        return $this->faker;
    }
}
