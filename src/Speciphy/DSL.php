<?php
namespace Speciphy\DSL;
use Speciphy\Describe;

function describe($subjectName, $expectations) {
    return new Describe($subjectName, $expectations);
}

function context($subjectName, $expectations) {
    return new Describe($subjectName, $expectations);
}
