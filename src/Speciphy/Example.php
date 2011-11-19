<?php
namespace Speciphy;

class Example
{
    /**
     * Context of this example.
     *
     * @var Speciphy\ExampleGroup
     */
    protected $_exampleGroup;

    /**
     * Text represents this example.
     *
     * @var string
     */
    protected $_description;

    /**
     * Procedure of this example.
     *
     * @var Closure
     */
    protected $_block;

    /**
     * Constructor.
     *
     * @param Speciphy\ExampleGroup
     * @param string
     * @param Closure
     */
    public function __construct($exampleGroup, $description, $block)
    {
        $this->_exampleGroup = $exampleGroup;
        $this->_description  = $description;
        $this->_block        = $block;
    }

    /**
     * Gets the description of this example.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * Invokes its block.
     *
     * @return void
     */
    public function run()
    {
        $this->_exampleGroup->runBeforeHooks();
        try {
            $this->_block->__invoke();
        } catch (\Exception $e) {
        }
        $this->_exampleGroup->runAfterHooks();
    }
}
