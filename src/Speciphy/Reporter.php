<?php
namespace Speciphy;

class Reporter
{
    protected $_messages = array();

    public function push($message)
    {
        $this->_messages[] = $message;
    }
}
