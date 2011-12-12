<?php
namespace Speciphy\Tests;

use Speciphy\ExampleGroup;
use Speciphy\Subject;

class ExampleGroupTest extends TestCase
{
    /**
     * @test
     */
    public function getDescription_should_be_its_description()
    {
        $exampleGroup = new ExampleGroup('Foo');
        $this->assertSame('Foo', $exampleGroup->getDescription());
    }

    /**
     * @test
     */
    public function getAncestors_should_be_array_of_its_ancestors()
    {
        $grandParent = new ExampleGroup('GrandParent');
        $parent      = new ExampleGroup('Parent');
        $child       = new ExampleGroup('Child');
        $grandParent->addChild($parent);
        $parent->addChild($child);

        $this->assertSame(array($parent, $grandParent), $child->getAncestors());
    }

    /**
     * @test
     */
    public function getAncestors_should_be_empty_if_it_has_no_parent()
    {
        $exampleGroup = new ExampleGroup('Foo');
        $this->assertSame(array(), $exampleGroup->getAncestors());
    }

    /**
     * @test
     */
    public function getNestLevel_should_be_0_when_no_parent()
    {
        $exampleGroup = new ExampleGroup('Foo');
        $this->assertSame(0, $exampleGroup->getNestLevel());
    }

    /**
     * @test
     */
    public function getNestLevel_should_be_1_when_one_parent()
    {
        $parent = new ExampleGroup('Foo');
        $child  = new ExampleGroup('Bar');
        $parent->addChild($child);
        $this->assertSame(1, $child->getNestLevel());
    }

    /**
     * @test
     */
    public function getNestLevel_should_the_nest_level_of_ExampleGroup()
    {
        $group0 = new ExampleGroup('0');
        $group1 = new ExampleGroup('1');
        $group2 = new ExampleGroup('2');
        $group3 = new ExampleGroup('2');
        $group4 = new ExampleGroup('2');
        $group5 = new ExampleGroup('2');
        $group0->addChild($group1);
        $group1->addChild($group2);
        $group2->addChild($group3);
        $group3->addChild($group4);
        $group4->addChild($group5);
        $this->assertSame(5, $group5->getNestLevel());
    }

    /**
     * @test
     */
    public function getSubject_should_be_Subject_set_before()
    {
        $subject = new Subject(function () {});
        $group   = new ExampleGroup('Foo');
        $group->setSubject($subject);
        $this->assertSame($subject, $group->getSubject());
    }
}
