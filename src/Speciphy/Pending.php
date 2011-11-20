<?php
namespace Speciphy;

class Pending implements ExampleInterface
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
     * Constructor.
     *
     * @param Speciphy\ExampleGroup
     * @param string
     */
    public function __construct($description)
    {
        $this->_description  = $description;
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

    public function setParent($parent)
    {
        $this->_exampleGroup = $parent;
    }

    public function getExampleGroup()
    {
        return $this->_exampleGroup;
    }

    /**
     * Whether this is pending.
     *
     * @return bool
     */
    public function isPending()
    {
        return true;
    }

    public function isExampleGroup()
    {
        return false;
    }
}
