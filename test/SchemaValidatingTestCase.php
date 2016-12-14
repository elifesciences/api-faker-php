<?php

namespace test\eLife\ApiFaker;

use JsonSchema\RefResolver;
use JsonSchema\Uri\UriResolver;
use JsonSchema\Uri\UriRetriever;
use JsonSchema\Validator;

trait SchemaValidatingTestCase
{
    use PuliAwareTestCase;

    /**
     * @var Validator
     */
    private static $validator;

    /**
     * @var RefResolver
     */
    private static $refResolver;

    private static $schemas = [];

    /**
     * @beforeClass
     */
    public static function setUpValidator()
    {
        self::$validator = new Validator();
        self::$refResolver = new RefResolver(new UriRetriever(), new UriResolver());
    }

    final protected function validate(array $object, string $schema)
    {
        self::$validator->reset();

        if (empty(self::$schemas[$schema])) {
            $this->loadSchema($schema);
        }

        self::$validator->check(json_decode(str_replace('"http:', '"https:', json_encode($object))), self::$schemas[$schema]);

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

    final private function loadSchema(string $schema)
    {
        self::$schemas[$schema] = self::$refResolver->resolve('file://'.$this::$puli->get($schema)->getFilesystemPath());
    }
}
