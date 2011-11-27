<?php
namespace Speciphy\Tests;

use \Speciphy\Matchers;
use \Speciphy\Matchers\BeTrue;

class MatchersTest extends TestCase
{
    /**
     * @test
     */
    public function createMatcher_should_return_a_matcher()
    {
        $matchers = new Matchers;
        $matchers->addmatcher('beTrue', '\\Speciphy\\Matchers\\BeTrue');
        $matcher = $matchers->createMatcher('beTrue');
        $this->assertInstanceOf('\\Speciphy\\Matchers\\BeTrue', $matcher);
    }

    /**
     * @test
     * @expectedException \BadMethodCallException
     */
    public function createMatcher_should_throw_BadMethodCallException_if_no_matcher_found()
    {
        $matchers = new Matchers;
        $matchers->createMatcher('beUndefinedMatcher');
    }
}
