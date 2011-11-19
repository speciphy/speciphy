<?php
namespace Speciphy\Tests;

use Speciphy\ExampleGroup;

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
}
