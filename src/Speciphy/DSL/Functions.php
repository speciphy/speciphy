<?php
namespace Speciphy\DSL;

// Dummy class for auto-loading.
class Functions {}

use Speciphy\ExampleGroup;
use Speciphy\Example;
use Speciphy\Pending;
use Speciphy\Subject;

use \Esperance\Assertion;

function describe($description) {
    $exampleGroup = new ExampleGroup($description);

    $args = func_get_args();
    array_shift($args);
    foreach ($args as $key => $value) {
        if (is_int($key)) {
            if ($value instanceof ExampleGroup ||
                $value instanceof Example ||
                $value instanceof Pending) {
                $exampleGroup->addChild($value);
            } else if ($value instanceof Subject) {
                $exampleGroup->setSubject($value);
            }
        }
    }

    return $exampleGroup;
}

function context($description) {
    return call_user_func_array('\\Speciphy\\DSL\\describe', func_get_args());
}

function it($description, $block = NULL) {
    if (is_null($block)) {
        return new Pending($description);
    } else {
        return new Example($description, $block);
    }
}

function subject($block) {
    return new Subject($block);
}

function expect($subject) {
    return new Assertion($subject);
}
