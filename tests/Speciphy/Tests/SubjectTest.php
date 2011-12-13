<?php
namespace Speciphy\Tests;

use Speciphy\Subject;

class SubjectTest extends TestCase
{
    /**
     * @test
     */
    public function getBlock_should_be_Closure_set_by_constructor()
    {
        $block = function () {};
        $subject = new Subject($block);
        $this->assertSame($block, $subject->getBlock());
    }
}
