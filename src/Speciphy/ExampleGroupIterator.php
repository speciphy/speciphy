<?php
namespace Speciphy;

use RecursiveIterator;
use Speciphy\ExampleGroup;

/**
 * Iterator of ExampleGroup.
 *
 * @author Yuya Takeyama
 */
class ExampleGroupIterator extends ExampleGroup implements RecursiveIterator
{
    protected $_pointer;

    protected $_count;

    public function __construct($description)
    {
        parent::__construct($description);
    }

    public function rewind()
    {
        $this->_pointer = 0;
        $this->_count = count($this->getExamples());
    }

    public function key()
    {
        return $this->_pointer;
    }

    public function next()
    {
        $this->_pointer++;
    }

    public function current()
    {
        $examples = $this->getExamples();
        return $examples[$this->key()];
    }

    public function valid()
    {
        return $this->key() < $this->_count;
    }

    public function hasChildren()
    {
        return $this->current() instanceof ExampleGroup;
    }

    public function getExampleGroup()
    {
        return $this->_exampleGroup;
    }

    public function getChildren()
    {
        return $this->current()->getIterator();
    }
}
