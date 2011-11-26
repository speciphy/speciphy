<?php
namespace Speciphy\DSL;

use Speciphy\ExampleGroup;
use Speciphy\Example;
use Speciphy\Pending;
use Speciphy\Subject;

function describe($description, $specElements) {
    $exampleGroup = new ExampleGroup($description);

    foreach ($specElements as $key => $value) {
        if (is_int($key)) {
            if ($value instanceof ExampleGroup) {
                $exampleGroup->addChild($value);
            } else if (is_string($value)) {
                $exampleGroup->addChild(new Pending($value));
            } else if ($value instanceof Subject) {
                $exampleGroup->setSubject($value);
            }
        } else if (is_string($key)) {
            switch ($key) {
            case 'before':
                $exampleGroup->setBeforeHook($value);
                break;
            case 'after':
                $exampleGroup->setAfterHook($value);
                break;
            case 'before_all':
            case 'beforeAll':
                $exampleGroup->setBeforeAllHook($value);
                break;
            case 'after_all':
            case 'afterAll':
                $exampleGroup->setAfterAllHook($value);
                break;
            default:
                $exampleGroup->addChild(new Example($key, $value));
            }
        }
    }

    return $exampleGroup;
}

function context($description, $examples) {
    return describe($description, $examples);
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
