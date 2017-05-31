<?php

namespace spec\Product;

use Product\Product;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWithId(123);
    }

    function it_exposes_product_identity()
    {
        $this->getId()->shouldReturn(123);
    }

    function it_contains_details()
    {
        $this->hasDetails(['name' => 'product1']);
    }

    function it_exposes_details()
    {
        $this->hasDetails(['name' => 'product1']);
        $this->getDetails()->shouldReturn(['name' => 'product1']);
    }
}
