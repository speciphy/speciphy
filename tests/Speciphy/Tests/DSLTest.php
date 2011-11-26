<?php
namespace Speciphy\Tests;

require_once 'Speciphy/DSL.php';
use Speciphy\DSL;

class DSLTest extends TestCase
{
    /**
     * @test
     */
    public function describe_creates_ExampleGroup_object()
    {
        $this->assertInstanceOf('Speciphy\\ExampleGroup', DSL\describe('Foo', array()));
    }

    /**
     * @test
     */
    public function describe_creates_ExampleGroup_and_sets_description()
    {
        $exampleGroup = DSL\describe('Foo', array());
        $this->assertSame('Foo', $exampleGroup->getDescription());
    }

    /**
     * @test
     */
    public function describe_creates_ExampleGroup_have_Example_set_with_array()
    {
        $exampleGroup = DSL\describe('Foo', array(
            'It should be foo.' => function () {},
        ));
        $examples = $exampleGroup->getExamples();
        $example  = $examples[0];
        $this->assertInstanceOf('Speciphy\Example', $example);
        $this->assertSame('It should be foo.', $example->getDescription());
    }

    /**
     * @test
     */
    public function describe_creates_ExampleGroup_have_Pending_set_with_array()
    {
        $exampleGroup = DSL\describe('Foo', array(
            'It should be foo.',
        ));
        $examples = $exampleGroup->getExamples();
        $example  = $examples[0];
        $this->assertInstanceOf('Speciphy\Pending', $example);
        $this->assertSame('It should be foo.', $example->getDescription());
    }

    /**
     * @test
     */
    public function describe_creates_ExampleGroup_have_subject_set_with_array()
    {
        $f = function () {};
        $exampleGroup = DSL\describe('Foo', array(
            'subject' => $f,
        ));
        $this->assertSame($f, $exampleGroup->getSubject()->getBlock());
    }

    /**
     * @test
     */
    public function subject_is_not_an_Example()
    {
        $exampleGroup = DSL\describe('Foo', array(
            'subject' => function () {},
        ));
        $this->assertSame(0, count($exampleGroup->getExamples()));
    }

    /**
     * @test
     */
    public function it_function_without_Closure_should_be_Pending_object()
    {
        $this->assertInstanceOf('Speciphy\\Pending', DSL\it('should be foo'));
    }

    /**
     * @test
     */
    public function it_function_with_Closure_should_be_Example_object()
    {
        $this->assertInstanceOf('Speciphy\\Example', DSL\it('should be foo', function () {}));
    }
}
