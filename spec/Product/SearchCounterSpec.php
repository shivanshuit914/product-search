<?php

namespace spec\Product;

use Product\Product;
use Product\ProductCacheRepositoryInterface;
use Product\SearchCounter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SearchCounterSpec extends ObjectBehavior
{
    function let(ProductCacheRepositoryInterface $productCacheRepository)
    {
        $this->beConstructedWith($productCacheRepository);
    }

    function it_counts_product_search(ProductCacheRepositoryInterface $productCacheRepository)
    {
        $product = Product::withId(123);
        $productCacheRepository->update($product);
        $this->count($product)->shouldReturn(null);
    }
}
