<?php

namespace eLife\ApiFaker\Provider;

use Assert\Assert;
use Faker\Provider\Base;

final class BlocksProvider extends Base
{
    public function blocksV1(int $minimum = null, int $maximum = null) : array
    {
        Assert::thatNullOr($minimum)->min(1, 'Must contain at least 1 block');
        Assert::thatNullOr($maximum)->greaterOrEqualThan($minimum, 'Maximum must be greater than or equal to the minimum');

        if (null === $minimum) {
            $minimum = $this->generator->numberBetween(1, 5);
        }

        if (null === $maximum) {
            $maximum = $this->generator->numberBetween($minimum, $minimum + 5);
        }

        return array_map(function () {
            return $this->generator->paragraphBlockV1;
        }, range(1, $this->generator->numberBetween($minimum, $maximum)));
    }
}
