<?php
namespace Speciphy\DSL;

use SpeciphyExamples\Stack;

return describe('Stack', array(
    context('When empty', array(
        'subject' => function () {
            return new Stack;
        },

        'It should be empty.' => function ($it) {
            $it->should()->beEmpty();
        },
    )),

    context('When has 1 item', array(
        'subject' => function () {
            return new Stack(array(1));
        },

        'It should not be empty.' => function ($it) {
            $it->shouldNot()->beEmpty();
        },
    )),
));
