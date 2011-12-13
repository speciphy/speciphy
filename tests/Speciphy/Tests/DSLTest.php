<?php
namespace Speciphy\Tests;

require_once 'Speciphy/DSL.php';
use Speciphy\DSL;
use Speciphy\Subject;

class DSLTest extends TestCase
{
    /**
     * @test
     */
    public function describe_creates_ExampleGroup_object()
    {
        $this->assertInstanceOf('Speciphy\\ExampleGroup', DSL\describe('Foo'));
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
            DSL\it('should be foo', function () {
            }),
        ));
        $examples = $exampleGroup->getExamples();
        $example  = $examples[0];
        $this->assertInstanceOf('Speciphy\Example', $example);
        $this->assertSame('should be foo', $example->getDescription());
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
    public function describe_creates_ExampleGroup_from_arguments_if_2nd_argument_is_not_array()
    {
        $inner = DSL\describe('Foo');
        $outer = DSL\describe('Bar', $inner);
        $examples = $outer->getExamples();
        $this->assertSame($inner, $examples[0]);
    }

    /**
     * @test
     */
    public function describe_creates_ExampleGroup_have_subject_set_as_argument()
    {
        $subject = new Subject(function () {});
        $group = DSL\describe('Foo', $subject);
        $this->assertSame($subject, $group->getSubject());
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

    /**
     * @test
     */
    public function subject_function_should_be_Subject_object()
    {
        $block = function () {};
        $subject = DSL\subject($block);
        $this->assertSame($block, $subject->getBlock());
    }
}
