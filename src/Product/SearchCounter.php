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

    public function count(Product $product)
    {
        $product->incrementSearchCount();
        $this->productCacheRepository->update($product);
    }
}
