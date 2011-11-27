<?php
namespace Speciphy\Expectations;

use Speciphy\Expectations\ExpectationHandlerAbstract;
use Speciphy\Matchers\MatcherAbstract as Matcher;

class NegativeExpectationHandler extends ExpectationHandlerAbstract
{
    public function handleMatcher(Matcher $matcher)
    {
        if ($matcher->matches($this->_actual)) {
            throw new \Exception($this->getMessage($matcher));
        } else {
        }
    }

    public function getMessage(Matcher $matcher)
    {
        return $matcher->getFailureMessageForShouldNot();
    }
}
