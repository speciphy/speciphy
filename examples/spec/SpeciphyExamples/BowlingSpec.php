<?php
namespace Speciphy\DSL;

require_once __DIR__ . '/../../src/SpeciphyExamples/Bowling.php';

use \SpeciphyExamples\Bowling;

return describe('Bowling',
    context('全てガーターのとき',
        subject(function () {
            $bowling = new Bowling;
            for ($i = 1; $i <= 20; $i++) {
                $bowling->hit(0);
            }
            return $bowling;
        }),

        it('スコアは 0 になる', function ($bowling) {
            expect($bowling->score)->to->be(0);
        })
    )
);
