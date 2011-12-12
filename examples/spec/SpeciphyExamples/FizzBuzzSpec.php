<?php
namespace Speciphy\DSL;

use \SpeciphyExamples\FizzBuzz;

return describe('FizzBuzz', array(
    context('15 の倍数', array(
        'subject' => function () {
            $fizzbuzz = new FizzBuzz;
            return $fizzbuzz->calc(15);
        },

        it('FizzBuzz になる', function ($it) {
            $it->should->be('FizzBuzz');
        }),
    )),
));
