<?php

namespace eLife\ApiFaker\Provider;

use Assert\Assert;
use Faker\Provider\Base;

final class LabsExperimentProvider extends Base
{
    public function labsExperimentSnippetV1(int $number = null) : array
    {
        Assert::thatNullOr($number)->min(1, 'Number must be at least 1');

        $data = [
            'number' => $number ?? $this->generator->numberBetween(1),
            'title' => $this->generator->sentence,
            'published' => $this->generator->dateTimeBetween('2012-01-01')->format('Y-m-d\TH:i:s\Z'),
            'image' => [
                'banner' => $this->generator->bannerV1,
                'thumbnail' => $this->generator->thumbnailV1,
            ],
        ];

        if ($this->generator->boolean()) {
            $data['impactStatement'] = $this->generator->text;
        }

        return $data;
    }

    public function labsExperimentV1(int $number = null) : array
    {
        $data = $this->generator->labsExperimentSnippetV1($number);

        $data['content'] = $this->generator->blocksV1(5);

        return $data;
    }
}
