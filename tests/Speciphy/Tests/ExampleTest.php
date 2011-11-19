<?php
namespace Speciphy\Tests;

use Speciphy\Example;

class ExampleTest extends TestCase
{
    /**
     * @test
     */
    public function getDescription_should_be_description_of_the_example()
    {
        $example = new Example($this->getMockExampleGroup(), 'Foo', function () {});
        $this->assertSame('Foo', $example->getDescription());
    }

    /**
     * @test
     */
    public function run_should_invoke_runBeforeHooks_of_ExampleGroup()
    {
        $exampleGroup = $this->getMockExampleGroup();
        $exampleGroup->expects($this->once())
            ->method('runBeforeHooks');
        $example = new Example($exampleGroup, 'Example', function () {});
        $example->run();
    }

    /**
     * @test
     */
    public function run_should_invoke_runAfterHooks_of_ExampleGroup()
    {
        $exampleGroup = $this->getMockExampleGroup();
        $exampleGroup->expects($this->once())
            ->method('runAfterHooks');
        $example = new Example($exampleGroup, 'Example', function () {});
        $example->run();
    }

    /**
     * @test
     */
    public function run_should_invoke_runAfterHooks_of_ExampleGroup_even_if_exception_is_thrown()
    {
        $exampleGroup = $this->getMockExampleGroup();
        $exampleGroup->expects($this->once())
            ->method('runAfterHooks');
        $example = new Example($exampleGroup, 'Example', function () {
            throw new \RuntimeException;
        });
        $example->run();
    }

    protected function getMockExampleGroup()
    {
        return $this->getMock(
            'Speciphy\ExampleGroup',
            array(),
            array(),
            'MockExampleGroup_' . uniqid(),
            false
        );
    }
}
