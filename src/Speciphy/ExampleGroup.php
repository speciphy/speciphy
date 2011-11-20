<?php
namespace Speciphy;

use RecursiveIterator;
use Speciphy\ExampleInterface;

class ExampleGroup implements RecursiveIterator
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
     * Pointer of iterator.
     *
     * @var int
     */
    protected $_pointer;

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

    public function getExamples()
    {
        return $this->_examples;
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

    /**
     * Gets the nest level.
     *
     * @return int
     */
    public function getNestLevel()
    {
        return isset($this->_parent) ? $this->_parent->getNestLevel() + 1 : 0;
    }

    public function rewind()
    {
        $this->_pointer = 0;
    }

    public function key()
    {
        return $this->_pointer;
    }

    public function current()
    {
        return $this->_examples[$this->key()];
    }

    public function valid()
    {
        return $this->key() < count($this->_examples);
    }

    public function next()
    {
        $this->_pointer++;
    }

    public function hasChildren()
    {
        return $this->current() instanceof ExampleGroup;
    }

    public function getChildren()
    {
        return $this->current();
    }
}
