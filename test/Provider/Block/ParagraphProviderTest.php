<?php

namespace test\eLife\ApiFaker\Provider\Block;

use test\eLife\ApiFaker\Provider\ProviderTestCase;

final class ParagraphProviderTest extends ProviderTestCase
{
    /**
     * @test
     */
    public function it_provides_a_paragraph_block_v1()
    {
        $block = $this->getFaker()->paragraphBlocKV1;

        $this->assertArrayHasKey('type', $block);
        $this->assertSame('paragraph', $block['type']);
        $this->assertArrayHasKey('text', $block);
    }
}
