<?php
namespace Speciphy\DSL;

use Speciphy\ExampleGroup;
use Speciphy\Example;
use Speciphy\Pending;

function describe($description, $specElements) {
    $exampleGroup = new ExampleGroup($description);

    foreach ($specElements as $key => $value) {
        if (is_int($key)) {
            if ($value instanceof ExampleGroup) {
                $exampleGroup->addChild($value);
            } else if (is_string($value)) {
                $exampleGroup->addChild(new Pending($value));
            }
        } else if (is_string($key)) {
            switch ($key) {
            case 'subject':
                $exampleGroup->setSubjectBlock($value);
                break;
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
