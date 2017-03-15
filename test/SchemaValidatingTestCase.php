<?php

namespace test\eLife\ApiFaker;

use ComposerLocator;
use JsonSchema\Validator;

trait SchemaValidatingTestCase
{
    /**
     * @var Validator
     */
    private static $validator;

    /**
     * @beforeClass
     */
    public static function setUpValidator()
    {
        self::$validator = new Validator();
    }

    final protected function validate(array $object, string $schema)
    {
        self::$validator->reset();

        self::$validator->check(json_decode(str_replace('"http:', '"https:', json_encode($object))), (object) ['$ref' => 'file://'.ComposerLocator::getPath('elife/api')."/dist/model/$schema"]);

        $this->assertTrue(
            self::$validator->isValid(),
            implode(PHP_EOL, array_map(
                function (array $error) {
                    return sprintf('[%s] %s', $error['property'], $error['message']);
                },
                self::$validator->getErrors()
            ))
        );
    }
}
