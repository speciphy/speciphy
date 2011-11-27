<?php
namespace Speciphy\Expectations;

use \Speciphy\Subject;
use \Speciphy\Matchers as Matchers;
use \Speciphy\Matchers\MatcherAbstract as Matcher;

abstract class ExpectationHandlerAbstract
{
    /**
     * @var mixed
     */
    protected $_actual;

    /**
     * Constructor.
     *
     * @param Speciphy\Subject $subject
     */
    public function __construct(Subject $subject)
    {
        $this->_actual = $subject->getValue();
    }

    public function __call($name, $args)
    {
        $matcher = call_user_func_array(
            array(Matchers::getInstance(), 'createMatcher'),
            array_merge(array($name), $args)
        );
        $this->handleMatcher($matcher);
    }

    abstract public function handleMatcher(Matcher $matcher);

    abstract public function getMessage(Matcher $matcher);

    public function fail()
    {
    }
}
