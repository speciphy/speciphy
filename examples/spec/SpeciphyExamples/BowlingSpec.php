<?php
namespace Speciphy\DSL;

use \SpeciphyExamples\Bowling;

return describe('Bowling', array(
    context('全てガーターのとき', array(
        'subject' => function () {
            $bowling = new Bowling;
            for ($i = 1; $i <= 20; $i++) {
                $bowling->hit(0);
            }
            return $bowling;
        },

        it('スコアは 0 になる', function ($it) {
            $it->getScore()->should->be(0);
        }),
    )),
));
