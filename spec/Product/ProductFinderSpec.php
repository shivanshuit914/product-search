<?php

namespace spec\Product;

use Product\Product;
use Product\ProductCacheRepositoryInterface;
use Product\ProductDatabaseRepositoryInterface;
use Product\ProductFinder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductFinderSpec extends ObjectBehavior
{
    function let(
        ProductCacheRepositoryInterface $cacheRepository,
        ProductDatabaseRepositoryInterface $databaseRepository) {
        $this->beConstructedWith($cacheRepository, $databaseRepository);
    }

    function it_finds_product_from_cache_when_its_available_in_cache(
        ProductCacheRepositoryInterface $cacheRepository,
        ProductDatabaseRepositoryInterface $databaseRepository) {
        $product = Product::withId(123);
        $product->hasDetails(['name' => 'product1']);
        $cacheRepository->findById(123)->willReturn($product);
        $this->findProductDetails(123)->shouldReturn($product);
    }

    function it_finds_product_from_database_when_its_not_available_in_cache(
        ProductCacheRepositoryInterface $cacheRepository,
        ProductDatabaseRepositoryInterface $databaseRepository) {
        $product = Product::withId(123);
        $product->hasDetails(['name' => 'product1']);
        $cacheRepository->findById(123)->willReturn(null);
        $databaseRepository->findById(123)->willReturn($product);
    }
}
