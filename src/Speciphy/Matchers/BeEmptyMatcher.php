<?php
namespace Speciphy\Matchers;

class BeEmptyMatcher
{
    public function getName()
    {
        return 'BeEmpty';
    }

    public function match($actual)
    {
        return $actual->isEmpty();
    }
}
