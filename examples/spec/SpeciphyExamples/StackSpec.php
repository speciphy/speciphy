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

    context('When has some items', array(
        context('1 item', array(
            'subject' => function () {
                return new Stack(array(1));
            },

            'It should not be empty.' => function ($it) {
                $it->shouldNot()->beEmpty();
            },
        )),

        context('10 items', array(
            'subject' => function () {
                return new Stack(array(1, 2, 3, 4, 5, 6, 7, 8 ,9, 10));
            },

            'It should not be empty.' => function ($it) {
                $it->shouldNot()->beEmpty();
            },

            'It should have 10 items.',
        )),
    )),
));
