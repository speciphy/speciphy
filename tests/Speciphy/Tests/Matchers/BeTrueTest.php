<?php
namespace Speciphy\Tests\Matchers;

use \Speciphy\Tests\TestCase;
use \Speciphy\Matchers\BeTrue;

class BeTrueTest extends TestCase
{
    /**
     * @test
     */
    public function matches_should_be_true_if_actual_is_true()
    {
        $matcher = new BeTrue;
        $this->assertTrue($matcher->matches(true));
    }

    /**
     * @test
     */
    public function matches_should_be_false_if_actual_is_false()
    {
        $matcher = new BeTrue;
        $this->assertFalse($matcher->matches(false));
    }

    /**
     * @test
     */
    public function matches_should_be_false_if_actual_is_not_a_boolean()
    {
        $matcher = new BeTrue;
        $this->assertFalse($matcher->matches('string'));
    }
}
