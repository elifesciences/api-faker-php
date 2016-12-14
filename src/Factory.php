<?php

namespace eLife\ApiFaker;

use Faker\Factory as Faker;
use Faker\Generator;

final class Factory
{
    public static function create() : Generator
    {
        $faker = Faker::create();

        $faker->addProvider(new Provider\BlocksProvider($faker));
        $faker->addProvider(new Provider\Block\ParagraphProvider($faker));
        $faker->addProvider(new Provider\ImageProvider($faker));
        $faker->addProvider(new Provider\LabsExperimentProvider($faker));

        return $faker;
    }
}
