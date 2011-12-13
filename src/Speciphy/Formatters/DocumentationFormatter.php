<?php
namespace Speciphy\Formatters;

class DocumentationFormatter
{
    protected $_buffer;

    public function __construct()
    {
        $this->_buffer = '';
    }

    public function exampleGroupStarted($group)
    {
        $this->_buffer .= str_repeat('  ', $group->getNestLevel());
        $this->_buffer .= $group->getDescription() . PHP_EOL;
    }

    public function exampleStarted($example)
    {}

    public function examplePassed($example)
    {
        $this->_buffer .= str_repeat('  ', $example->getNestLevel());
        $this->_buffer .= $example->getDescription() . PHP_EOL;
    }

    public function exampleFailed($example)
    {
        $this->_buffer .= str_repeat('  ', $example->getNestLevel());
        $this->_buffer .= $example->getDescription() . ' (FAILED)' . PHP_EOL;
    }

    public function examplePending($example)
    {
        $this->_buffer .= str_repeat('  ', $example->getNestLevel());
        $this->_buffer .= $example->getDescription() . ' (PENDING)' . PHP_EOL;
    }

    public function get()
    {
        return $this->_buffer;
    }
}
