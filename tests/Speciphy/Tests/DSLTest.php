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
        $exampleGroup = DSL\describe('Foo');
        $this->assertSame('Foo', $exampleGroup->getDescription());
    }

    /**
     * @test
     */
    public function describe_creates_ExampleGroup_have_Example()
    {
        $exampleGroup = DSL\describe('Foo',
            DSL\it('should be foo', function () {
            })
        );
        $examples = $exampleGroup->getExamples();
        $example  = $examples[0];
        $this->assertInstanceOf('Speciphy\Example', $example);
        $this->assertSame('should be foo', $example->getDescription());
    }

    /**
     * @test
     */
    public function describe_creates_ExampleGroup_have_Pending()
    {
        $exampleGroup = DSL\describe('Foo',
            DSL\it('should be foo')
        );
        $examples = $exampleGroup->getExamples();
        $example  = $examples[0];
        $this->assertInstanceOf('Speciphy\Pending', $example);
        $this->assertSame('should be foo', $example->getDescription());
    }

    /**
     * @test
     */
    public function describe_creates_ExampleGroup_have_Subject()
    {
        $subject = new Subject(function () {});
        $exampleGroup = DSL\describe('Foo', $subject);
        $this->assertSame($subject, $exampleGroup->getSubject());
    }

    /**
     * @test
     */
    public function context_should_treat_3rd_argument()
    {
        $example0 = DSL\it('Foo', function () {});
        $example1 = DSL\it('Bar', function () {});
        $group = DSL\context('Baz', $example0, $example1);
        $examples = $group->getExamples();
        $this->assertSame($examples[1], $example1);
    }

    /**
     * @test
     */
    public function subject_is_not_an_Example()
    {
        $exampleGroup = DSL\describe('Foo', DSL\subject(function () {}));
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
