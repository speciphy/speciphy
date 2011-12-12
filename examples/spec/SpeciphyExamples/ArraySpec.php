<?php
namespace Speciphy\DSL;

use SpeciphyExamples\Stack;

return describe('Array', array(
    context('When empty', array(
        'subject' => function () {
            return array();
        },

        it('should be empty', function ($it) {
            $it->should->beEmpty();
        }),
    )),

    context('When has 1 item', array(
        'subject' => function () {
            return array(1);
        },

        it('should not be empty', function ($it) {
            $it->shouldNot->beEmpty();
        }),
    )),
));
