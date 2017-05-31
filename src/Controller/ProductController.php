<?php

namespace Controller;

use Exception;
use Product\ProductCacheRepositoryInterface;
use Product\ProductDatabaseRepositoryInterface;
use Product\ProductFinder;
use Product\SearchCounter;

class ProductController
{
    /**
     * @var ProductCacheRepositoryInterface
     */
    private $cacheRepository;
    /**
     * @var ProductDatabaseRepositoryInterface
     */
    private $databaseRepository;

    /**
     * ProductController constructor.
     * @param ProductCacheRepositoryInterface $cacheRepository
     * @param ProductDatabaseRepositoryInterface $databaseRepository
     */
    public function __construct(
        ProductCacheRepositoryInterface $cacheRepository,
        ProductDatabaseRepositoryInterface $databaseRepository
    ) {
        $this->cacheRepository = $cacheRepository;
        $this->databaseRepository = $databaseRepository;
    }

    /**
     * @param string $productId
     *
     * @return string
     */
    public function getDetails(string $productId)
    {
        $response = [];
        try {
            $productFinder = new ProductFinder($this->cacheRepository, $this->databaseRepository);
            // assuming always getting product from DB or Cache
            $product = $productFinder->findProductDetails($productId);
            $searchCounter = new SearchCounter($this->cacheRepository);
            $searchCounter->count($product);
            $response['message'] = 'success.';
            $response['code'] = 200;
            $response['data'] = $product->getDetails();

        } catch (Exception $exception) {
            $response['message'] = $exception->getMessage();
            $response['code'] = 500;
        }

        return json_encode($response);
    }
}