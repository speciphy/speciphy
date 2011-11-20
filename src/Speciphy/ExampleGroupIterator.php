<?php
namespace Speciphy;

use RecursiveIterator;
use Speciphy\ExampleGroup;

class ExampleGroupIterator implements RecursiveIterator
{
    protected $_exampleGroup;

    protected $_examples;

    protected $_count;

    protected $_pointer;

    public function __construct(ExampleGroup $exampleGroup)
    {
        $this->_exampleGroup = $exampleGroup;
        $this->_examples     = $exampleGroup->getExamples();
        $this->_count        = count($this->_examples);
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

    public function next()
    {
        $this->_pointer++;
    }

    public function valid()
    {
        return $this->key() < $this->_count;
    }

    public function hasChildren()
    {
        return $this->current() instanceof ExampleGroup;
    }

    public function getChildren()
    {
        return new self($this->current());
    }
}
