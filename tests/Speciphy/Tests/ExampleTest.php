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
        $exampleGroup = $this->getMockExampleGroup();
        $example = new Example('Foo', function () {});
        $exampleGroup->addChild($example);
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
        $example = new Example('Example', function () {});
        $exampleGroup->addChild($example);
        $example->run($this->getMockReporter());
    }

    /**
     * @test
     */
    public function run_should_invoke_runAfterHooks_of_ExampleGroup()
    {
        $exampleGroup = $this->getMockExampleGroup();
        $exampleGroup->expects($this->once())
            ->method('runAfterHooks');
        $example = new Example('Foo', function () {});
        $exampleGroup->addChild($example);
        $example->run($this->getMockReporter());
    }

    /**
     * @test
     */
    public function run_should_invoke_runAfterHooks_of_ExampleGroup_even_if_exception_is_thrown()
    {
        $exampleGroup = $this->getMockExampleGroup();
        $exampleGroup->expects($this->once())
            ->method('runAfterHooks');
        $example = new Example('Example', function () {
            throw new \RuntimeException;
        });
        $exampleGroup->addChild($example);
        $example->run($this->getMockReporter());
    }

    protected function getMockExampleGroup($methods = array('runBeforeHooks', 'runAfterHooks'))
    {
        if (is_string($methods)) {
            $methods = array($methods);
        }
        return $this->getMock(
            'Speciphy\ExampleGroup',
            $methods,
            array(),
            'MockExampleGroup_' . uniqid(),
            false
        );
    }

    protected function getMockReporter()
    {
        return $this->getMock(
            'Speciphy\Reporter',
            array(),
            array(),
            'MockReporter_' . uniqid(),
            false
        );
    }
}
