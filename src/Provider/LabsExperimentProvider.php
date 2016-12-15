<?php

namespace eLife\ApiFaker\Provider;

use Assert\Assert;
use Faker\Provider\Base;

final class LabsExperimentProvider extends Base
{
    private $experiments = [];

    public function labsExperimentSnippetV1(int $number = null) : array
    {
        $data = $this->labsExperimentV1($number);

        unset($data['content']);

        return $data;
    }

    public function labsExperimentV1(int $number = null) : array
    {
        if (!isset($this->experiments[$number])) {
            Assert::thatNullOr($number)->min(1, 'Number must be at least 1');

            $this->experiments[$number] = [
                'number' => $number ?? $this->generator->numberBetween(1),
                'title' => $this->generator->sentence,
                'published' => $this->generator->dateTimeBetween('2012-01-01')->format('Y-m-d\TH:i:s\Z'),
                'image' => [
                    'banner' => $this->generator->bannerV1,
                    'thumbnail' => $this->generator->thumbnailV1,
                ],
                'content' => $this->generator->blocksV1(5),
            ];

            if ($this->generator->boolean()) {
                $this->experiments[$number]['impactStatement'] = $this->generator->text;
            }
        }

        return $this->experiments[$number];
    }
}
