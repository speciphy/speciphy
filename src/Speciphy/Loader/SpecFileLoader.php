<?php
namespace Speciphy\Loader;

use IteratorAggregate;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use Speciphy\Loader\SpecFileLoader\SpecFileFilter;

/**
 * Basic loader of spec files.
 *
 * Loads files named ***Spec.php.
 *
 * @author Yuya Takeyama
 */
class SpecFileLoader implements IteratorAggregate
{
    protected $_iterator;

    /**
     * Constructor.
     *
     * @param string $directory
     */
    public function __construct($directory)
    {
        $this->_iterator = new SpecFileFilter(
            new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($directory)
            )
        );
    }

    public function getIterator()
    {
        return $this->_iterator;
    }
}
