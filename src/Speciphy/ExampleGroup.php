<?php
namespace Speciphy;

use Speciphy\ExampleInterface;
use Speciphy\Expectations\PositiveExpectationHandler;
use Speciphy\Expectations\NegativeExpectationHandler;

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
     * Subject under test.
     *
     * @var Speciphy\Subject
     */
    protected $_subject;

    /**
     * Constructor.
     *
     * @param string $description
     */
    public function __construct($description)
    {
        $this->_description = $description;
        $this->_examples    = array();
    }

    /**
     * Gets the description of this.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * Adds a child of this and be its parent.
     *
     * @param  ExampleInterfae $example
     * @return void
     */
    public function addChild($child)
    {
        $child->setParent($this);
        $this->_examples[] = $child;
    }

    public function getExamples()
    {
        return $this->_examples;
    }

    public function setParent($parent)
    {
        $this->_parent = $parent;
    }

    public function getAncestors()
    {
        if (isset($this->_parent)) {
            return array_merge(array($this->_parent), $this->_parent->getAncestors());
        } else {
            return array();
        }
    }

    public function run($reporter)
    {
        $this->_reporter = $reporter;
        $reporter->exampleGroupStarted($this);
        $this->runBeforeAllHooks();
        foreach ($this->getExamples() as $example) {
            $example->run($reporter);
        }
        $this->runAfterAllHooks();
    }

    public function runBeforeAllHooks()
    {}

    public function runAfterAllHooks()
    {}

    public function runBeforeHooks()
    {}

    public function runAfterHooks()
    {}

    public function should()
    {
        $subject = $this->_subjectBlock->__invoke();
        return new PositiveExpectationHandler($subject, $this->_reporter);
    }

    public function shouldNot()
    {
        $subject = $this->_subjectBlock->__invoke();
        return new NegativeExpectationHandler($subject, $this->_reporter);
    }

    public function setSubject(Subject $subject)
    {
        $this->_subject = $subject;
    }

    public function getSubject()
    {
        return $this->_subject;
    }

    /**
     * Gets the nest level.
     *
     * @return int
     */
    public function getNestLevel()
    {
        return isset($this->_parent) ? $this->_parent->getNestLevel() + 1 : 0;
    }

    public function isExampleGroup()
    {
        return true;
    }
}
