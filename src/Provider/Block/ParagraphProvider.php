<?php

namespace eLife\ApiFaker\Provider\Block;

use Faker\Provider\Base;

final class ParagraphProvider extends Base
{
    public function paragraphBlocKV1() : array
    {
        return [
            'type' => 'paragraph',
            'text' => str_replace("\n", ' ', $this->generator->text(1000)),
        ];
    }
}
