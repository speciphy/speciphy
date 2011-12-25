Speciphy
========

master: [![Build Status](https://secure.travis-ci.org/speciphy/speciphy.png?branch=master)](http://travis-ci.org/speciphy/speciphy)
develop: [![Build Status](https://secure.travis-ci.org/speciphy/speciphy.png?branch=develop)](http://travis-ci.org/speciphy/speciphy)

xSpec BDD Framework for PHP.

Strongly inspired from RSpec.

Features
--------

- Nested context
- Specification with string
- Using PHPSpec Interceptor and Matcher(s)

Why I make this
---------------

I like both PHPUnit and PHPSpec, but I think they have common issue.

- No nested context
- Specification with camelCase or lower\_case\_with\_underscore method name

These are very messy.

PHP Development should be more enjoyable.

I have proposal (see below) and Speciphy shows working example.

Proposal for xSpec BDD Framework for PHP
----------------------------------------

1. Use function in namespace, Not method in class
2. <del>Use array to build nested structure</del> (Deprecated since 0.1.0)

More details are in below slide.

http://www.slideshare.net/taketyan/proposal-for-xspep-bdd-framework-for-php

Example
-------

```php
<?php
namespace Speciphy\DSL;

return
describe('Bowling',
    describe('->score',
        context('all gutter game',
            subject(function () {
                $bowling = new Bowling;
                for ($i = 1; $i <= 20; $i++) {
                    $bowling->hit(0);
                }
                return $bowling;
            }),

            it('should equal 0', function ($bowling) {
                $bowling->score->should->equal(0);
            })
        )
    )
);
```

Author
------

Yuya Takeyama
