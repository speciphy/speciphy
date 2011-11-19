<?php
namespace Speciphy;

use Speciphy\ExampleInterface;

class Example implements ExampleInterface
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
    public function __construct($description, $block)
    {
        $this->_description  = $description;
        $this->_block        = $block;
    }

    /**
     * Gets the parent of this example.
     *
     * @return Speciphy\ExampleGroup
     */
    public function getExampleGroup()
    {
        return $this->_exampleGroup;
    }

    public function setParent($parent)
    {
        $this->_exampleGroup = $parent;
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

    /**
     * Whether this is pending.
     *
     * @return bool
     */
    public function isPending()
    {
        return false;
    }
}
