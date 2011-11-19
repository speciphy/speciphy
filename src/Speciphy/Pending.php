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
    public function __construct($exampleGroup, $description)
    {
        $this->_exampleGroup = $exampleGroup;
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

    /**
     * Whether this is pending.
     *
     * @return bool
     */
    public function isPending()
    {
        return true;
    }
}
