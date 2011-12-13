<?php
namespace Speciphy;

class Reporter
{
    protected $_formatters;

    protected $_messages = array();

    protected $_exampleCount;

    protected $_failureCount;

    protected $_pendingCount;

    public function __construct()
    {
        $this->_exampleCount = $this->_failureCount = $this->_pendingCount = 0;
    }

    public function addFormatter($formatter)
    {
        $this->_formatters[] = $formatter;
    }

    public function notify($method, $arg)
    {
        $args = func_get_args();
        $method = array_shift($args);
        foreach ($this->_formatters as $formatter) {
            call_user_func_array(array($formatter, $method), $args);
        }
    }

    public function push($message)
    {
        $this->_messages[] = $message;
    }

    public function exampleGroupStarted($group)
    {
        $this->notify(__FUNCTION__, $group);
    }

    public function exampleStarted($example)
    {
        $this->_exampleCount++;
        $this->notify(__FUNCTION__, $example);
    }

    public function examplePassed($example)
    {
        $this->notify(__FUNCTION__, $example);
    }

    public function exampleFailed($example)
    {
        $this->_failureCount++;
        $this->notify(__FUNCTION__, $example);
    }

    public function examplePending($example)
    {
        $this->_pendingCount++;
        $this->notify(__FUNCTION__, $example);
    }
}
