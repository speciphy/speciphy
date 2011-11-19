<?php
namespace Speciphy\Loader\SpecFileLoader;

use FilterIterator;

class SpecFileFilter extends FilterIterator
{
    public function accept()
    {
        $file = $this->current();
        return $file->isFile() && (preg_match('/.Spec\.php$/u', $file->getBasename()));
    }
}
