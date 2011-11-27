<?php
namespace Speciphy\Matchers;

use \Speciphy\Matchers\MatcherAbstract;

class BeTrue extends MatcherAbstract
{
    public function matches($actual)
    {
        parent::matches($actual);
        return $actual === true;
    }

    public function getFailureMessageForShould()
    {}

    public function getFailureMessageForShouldNot()
    {}

    public function getDescription()
    {}
}
