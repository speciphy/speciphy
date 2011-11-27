<?php
namespace Speciphy\Expectations;

use Speciphy\Expectations\ExpectationHandlerAbstract;
use Speciphy\Matchers\MatcherAbstract as Matcher;

class PositiveExpectationHandler extends ExpectationHandlerAbstract
{
    public function handleMatcher(Matcher $matcher)
    {
        if ($matcher->matches($this->_actual)) {
        } else {
            throw new \Exception($this->getMessage($matcher));
        }
    }

    public function getMessage(Matcher $matcher)
    {
        return $matcher->getFailureMessageForShould();
    }
}
