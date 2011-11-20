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
    public function __construct($actual, $reporter)
    {
        $this->_actual = $actual;
        $this->_reporter = $reporter;
    }

    public static function handleMatcher($actual, $matcher, $reporter)
    {
        if ($matcher->match($actual)) {
        } else {
            throw new \Exception("{$matcher->getName()} failed.");
        }
    }

    public function beEmpty()
    {
        $matcher = new BeEmptyMatcher;
        $this->handleMatcher($this->_actual, $matcher, $this->_reporter);
    }
}
