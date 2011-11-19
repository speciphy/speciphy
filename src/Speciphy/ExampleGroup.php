<?php
namespace Speciphy;

use Speciphy\ExampleInterface;

class ExampleGroup
{
    /**
     * Text represents this ExampleGroup.
     *
     * @var string
     */
    protected $_description;

    /**
     * Set of examples.
     *
     * @var array
     */
    protected $_examples;

    /**
     * Outer ExampleGroup.
     *
     * @var ExampleGroup
     */
    protected $_parent;

    /**
     * Function returns subject under test.
     *
     * @var Closure
     */
    protected $_subject;

    /**
     * Constructor.
     *
     * @param string $description
     */
    public function __construct($description)
    {
        $this->_description = $description;
        $this->_examples    = array();
    }

    /**
     * Gets the description of this.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * Adds a child of this and be its parent.
     *
     * @param  ExampleInterfae $example
     * @return void
     */
    public function addChild($child)
    {
        $child->setParent($this);
        $this->_examples[] = $child;
    }

    public function setParent($parent)
    {
        $this->_parent = $parent;
    }

    public function getAncestors()
    {
        if (isset($this->_parent)) {
            return array_merge(array($this->_parent), $this->_parent->getAncestors());
        } else {
            return array();
        }
    }

    public function runBeforeHooks()
    {}

    public function runAfterHooks()
    {}
}
