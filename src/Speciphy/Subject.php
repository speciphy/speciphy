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
        return new PositiveExpectationHandler($this);
    }

    public function shouldNot()
    {
        return new NegativeExpectationHandler($this);
    }

    public function getValue()
    {
        return call_user_func($this->_block);
    }
}
