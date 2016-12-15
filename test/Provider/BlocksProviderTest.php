<?php

namespace test\eLife\ApiFaker\Provider;

use Traversable;

final class BlocksProviderTest extends ProviderTestCase
{
    /**
     * @test
     * @dataProvider blocksProvider
     */
    public function it_provides_an_array_of_blocks_at_v1(int $minimum = null, int $maximum = null, int $expectedMinimum = null, int $expectedMaximum = null)
    {
        $blocks = $this->getFaker()->blocksV1($minimum, $maximum);

        $this->assertNotEmpty($blocks);
        foreach ($blocks as $block) {
            $this->assertArrayHasKey('type', $block);
        }

        if ($expectedMinimum) {
            $this->assertGreaterThanOrEqual($expectedMinimum, count($blocks));
        }
        if ($expectedMaximum) {
            $this->assertLessThanOrEqual($expectedMaximum, count($blocks));
        }
    }

    public function blocksProvider() : Traversable
    {
        yield 'null' => [null, null, null, null];
        yield 'min 10' => [10, null, 10, null];
        yield 'max 10' => [null, 10, null, 10];
        yield 'min 10, max 10' => [10, 10, 10, 10];
    }
}
