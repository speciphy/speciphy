<?php
namespace Speciphy;

/**
 * Wrapper object of subject under test.
 *
 * @author Yuya Takeyama
 */
class Expectation
{
    /**
     * Subject under test.
     *
     * @var mixed
     */
    protected $_subject;

    /**
     * Constructor.
     *
     * @param mixed $subject.
     */
    public function __construct($subject)
    {
        $this->_subject = $subject;
    }

    public function should()
    {}

    public function shouldNot()
    {}
}
