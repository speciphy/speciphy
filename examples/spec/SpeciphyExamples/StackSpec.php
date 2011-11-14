<?php
use Speciphy\Describe;
use Speciphy\Context;
use SpeciphyExamples\Stack;

return new Describe('Stack', array(
    new Context('When empty', array(
        'subject' => function () {
            return new Stack;
        },

        'It should be empty.' => function ($it) {
            $it->should->beEmpty();
        },
    )),

    new Context('When has 1 item', array(
        'subject' => function () {
            return new Stack(array(1));
        },

        'It should not be empty.' => function ($it) {
            $it->shouldNot->beEmpty();
        },
    )),
));
