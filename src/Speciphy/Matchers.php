<?php
namespace Speciphy;

use \BadMethodCallException;

class Matchers
{
    protected static $_instance;

    protected $_matchers = array();

    public static function getInstance()
    {
        if (empty(self::$_instance)) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    public static function define($name, $matcherClass)
    {
        $instance = Matchers::getInstance();
        $instance->addMatcher($name, $matcher);
    }

    public function addMatcher($name, $matcherClass)
    {
        $this->_matchers[$name] = $matcherClass;
    }

    public function createMatcher($name, $expected = NULL)
    {
        if (array_key_exists($name, $this->_matchers)) {
            $matcherClass = $this->_matchers[$name];
            if (is_null($expected)) {
                $matcher = new $matcherClass;
            } else {
                $matcher = new $matcherClass($expected);
            }
            return $matcher;
        } else {
            throw new BadMethodCallException("Undefined matcher '{$name}' is called.");
        }
    }
}
