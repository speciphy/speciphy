<?php
namespace Speciphy\Matchers;

abstract class MatcherAbstract
{
    protected $_expected;

    protected $_actual;

    /**
     * Constructor.
     *
     * @param mixed $expected Expected result.
     */
    public function __construct($expected = NULL)
    {
        $this->_expected = $expected;
    }

    public function matches($actual)
    {
        $this->_actual = $actual;
    }

    abstract public function getFailureMessageForShould();

    abstract public function getFailureMessageForShouldNot();

    abstract public function getDescription();
}
