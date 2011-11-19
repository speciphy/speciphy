<?php
namespace Speciphy;

class ExampleGroup
{
    /**
     * Text represents this ExampleGroup.
     *
     * @var string
     */
    protected $_description;

    /**
     * Set of examples.
     *
     * @var array
     */
    protected $_examples;

    /**
     * Outer ExampleGroup.
     *
     * @var ExampleGroup
     */
    protected $_parent;

    /**
     * Function returns subject under test.
     *
     * @var Closure
     */
    protected $_subject;

    /**
     * Constructor.
     *
     * @param string $description
     */
    public function __construct($description, $examples, $parent = NULL)
    {
        $this->_description = $description;
        $this->_examples    = $examples;
        $this->_parent      = $parent;
    }

    public function runBeforeHooks()
    {}

    public function runAfterHooks()
    {}
}
