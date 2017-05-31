<?php

namespace Product;

class SearchCounter
{
    /**
     * @var ProductCacheRepositoryInterface
     */
    private $productCacheRepository;

    /**
     * SearchCounter constructor.
     * @param ProductCacheRepositoryInterface $productCacheRepository
     */
    public function __construct(ProductCacheRepositoryInterface $productCacheRepository)
    {
        $this->productCacheRepository = $productCacheRepository;
    }

    /**
     * @param Product $product
     */
    public function count(Product $product) : void
    {
        $product->incrementSearchCount();
        $this->productCacheRepository->update($product);
    }
}
