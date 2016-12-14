<?php

namespace test\eLife\ApiFaker\Provider;

final class ImageProviderTest extends ProviderTestCase
{
    /**
     * @test
     */
    public function it_provides_a_banner_v1()
    {
        $image = $this->getFaker()->bannerV1;

        $this->assertArrayHasKey('alt', $image);
        $this->assertArrayHasKey('sizes', $image);
        $this->assertArrayHasKey('2:1', $image['sizes']);
        $this->assertArrayHasKey('900', $image['sizes']['2:1']);
        $this->assertArrayHasKey('1800', $image['sizes']['2:1']);
    }

    /**
     * @test
     */
    public function it_provides_a_thumbnail_v1()
    {
        $image = $this->getFaker()->thumbnailV1;

        $this->assertArrayHasKey('alt', $image);
        $this->assertArrayHasKey('sizes', $image);
        $this->assertArrayHasKey('16:9', $image['sizes']);
        $this->assertArrayHasKey('250', $image['sizes']['16:9']);
        $this->assertArrayHasKey('500', $image['sizes']['16:9']);
        $this->assertArrayHasKey('1:1', $image['sizes']);
        $this->assertArrayHasKey('70', $image['sizes']['1:1']);
        $this->assertArrayHasKey('140', $image['sizes']['1:1']);
    }
}
