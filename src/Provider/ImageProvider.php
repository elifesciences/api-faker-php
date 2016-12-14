<?php

namespace eLife\ApiFaker\Provider;

use Faker\Provider\Base;

final class ImageProvider extends Base
{
    public function bannerV1() : array
    {
        return [
            'alt' => $this->generator->boolean() ? '' : $this->generator->sentence,
            'sizes' => [
                '2:1' => [
                    '900' => $this->generator->imageUrl(900, 450),
                    '1800' => $this->generator->imageUrl(1800, 900),
                ],
            ],
        ];
    }

    public function thumbnailV1() : array
    {
        return [
            'alt' => $this->generator->boolean() ? '' : $this->generator->sentence,
            'sizes' => [
                '16:9' => [
                    '250' => $this->generator->imageUrl(250, 141),
                    '500' => $this->generator->imageUrl(500, 281),
                ],
                '1:1' => [
                    '70' => $this->generator->imageUrl(70, 70),
                    '140' => $this->generator->imageUrl(140, 140),
                ],
            ],
        ];
    }
}
