<?php
namespace Speciphy;
use Speciphy\Expectations\PositiveExpectationHandler;
use Speciphy\Expectations\NegativeExpectationHandler;

class Subject
{
    /**
     * Code block returns subject value.
     *
     * @var Closure
     */
    protected $_block;

    /**
     * Constructor.
     *
     * @param Closure $block
     */
    public function __construct($block)
    {
        $this->_block = $block;
    }

    /**
     * Gets the code block returns subject value.
     *
     * @return Closure
     */
    public function getBlock()
    {
        return $this->_block;
    }

    public function should()
    {
        $subject = call_user_func($this->getBlock());
        return new PositiveExpectationHandler($subject);
    }

    public function shouldNot()
    {
        $subject = call_user_func($this->getBlock());
        return new NegativeExpectationHandler($subject);
    }
}
