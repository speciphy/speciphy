<?php
namespace Speciphy\DSL;

return describe('Array',
    context('When empty',
        subject(function () {
            return array();
        }),

        it('should be empty', function ($it) {
            expect($it)->to->be->empty();
        })
    ),

    context('When has 1 item',
        subject(function () {
            return array(1);
        }),

        it('should not be empty', function ($it) {
            expect($it)->to->not->be->empty();
        })
    )
);
