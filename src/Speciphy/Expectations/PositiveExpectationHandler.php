<?php
namespace Speciphy\Expectations;

use Speciphy\Matchers\BeEmptyMatcher;

class PositiveExpectationHandler
{
    /**
     * Constructor.
     *
     * @param mixed $subject
     */
    public function __construct($actual)
    {
        $this->_actual = $actual;
    }

    public static function handleMatcher($actual, $matcher)
    {
        if ($matcher->match($actual)) {
        } else {
            throw new \Exception("{$matcher->getName()} failed.");
        }
    }

    public function beEmpty()
    {
        $matcher = new BeEmptyMatcher;
        $this->handleMatcher($this->_actual, $matcher);
    }

    public function beTrue()
    {
    }
}
