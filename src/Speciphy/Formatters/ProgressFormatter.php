<?php
namespace Speciphy\Formatters;

class ProgressFormatter
{
    protected $_fp;

    public function __construct($fp)
    {
        $this->_fp = $fp;
    }

    public function exampleGroupStarted($group)
    {}

    public function exampleStarted($example)
    {}

    public function examplePassed($example)
    {
        fputs($this->_fp, '.');
    }

    public function exampleFailed($example)
    {
        fputs($this->_fp, 'F');
    }

    public function examplePending($example)
    {
        fputs($this->_fp, '*');
    }
}
