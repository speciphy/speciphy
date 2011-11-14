<?php
namespace Speciphy;

/**
 * Specification consists of set of expectations.
 *
 * @author Yuya Takeyama
 */
class Describe
{
    /**
     * A text specifies system under test.
     *
     * @var string
     */
    protected $_subjectName;

    /**
     * Expectations.
     *
     * @var array
     */
    protected $_expectations;

    /**
     * Constructor.
     *
     * @param string $subjectName
     * @param array  $expectations
     */
    public function __construct($subjectName, $expectations)
    {
        $this->_subjectName  = $subjectName;
        $this->_expectations = $expectations;
    }
}
