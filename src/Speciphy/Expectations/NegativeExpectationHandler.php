<?php
namespace Speciphy\Expectations;

use Speciphy\Matchers\BeEmptyMatcher;

class NegativeExpectationHandler
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
            throw new \Exception("Not {$matcher->getName()} failed.");
        } else {
        }
    }

    public function beEmpty()
    {
        $matcher = new BeEmptyMatcher;
        $this->handleMatcher($this->_actual, $matcher, $this->_reporter);
    }
}
