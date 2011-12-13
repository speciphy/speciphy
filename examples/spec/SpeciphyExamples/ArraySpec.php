<?php
namespace Speciphy\DSL;

return describe('Array',
    context('When empty',
        subject(function () {
            return array();
        }),

        it('should be empty', function ($it) {
            $it->should->beEmpty();
        })
    ),

    context('When has 1 item',
        subject(function () {
            return array(1);
        }),

        it('should not be empty', function ($it) {
            $it->shouldNot->beEmpty();
        })
    )
);
