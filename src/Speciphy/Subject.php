<?php
namespace Speciphy;

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
}
