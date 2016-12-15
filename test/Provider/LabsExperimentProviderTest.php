<?php

namespace test\eLife\ApiFaker\Provider;

use test\eLife\ApiFaker\SchemaValidatingTestCase;

final class LabsExperimentProviderTest extends ProviderTestCase
{
    use SchemaValidatingTestCase;

    /**
     * @test
     */
    public function it_creates_a_labs_experiment_snippet_v1()
    {
        $snippet = $this->getFaker()->labsExperimentSnippetV1;

        $this->assertArrayHasKey('number', $snippet);
        $this->assertArrayHasKey('title', $snippet);
        $this->assertArrayHasKey('published', $snippet);
        $this->assertArrayHasKey('image', $snippet);
        $this->assertArrayHasKey('banner', $snippet['image']);
        $this->assertArrayHasKey('thumbnail', $snippet['image']);
    }

    /**
     * @test
     */
    public function it_creates_a_labs_experiment_v1()
    {
        $this->validate($this->getFaker()->labsExperimentV1, '/elife/api/model/labs-experiment.v1.json');
    }

    /**
     * @test
     */
    public function it_creates_a_labs_experiment_v1_once()
    {
        $first = $this->getFaker()->labsExperimentV1(1);
        $second = $this->getFaker()->labsExperimentV1(1);
        $snippet = $this->getFaker()->labsExperimentSnippetV1(1);
        $different = $this->getFaker()->labsExperimentV1(2);

        $this->assertSame($first['title'], $second['title']);
        $this->assertSame($first['title'], $snippet['title']);
        $this->assertNotSame($first['title'], $different['title']);
    }
}
