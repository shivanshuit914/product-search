<?php

namespace Product;

class ProductFinder
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
     * ProductFinder constructor.
     * @param ProductCacheRepositoryInterface $cacheRepository
     * @param ProductDatabaseRepositoryInterface $databaseRepository
     */
    public function __construct(
        ProductCacheRepositoryInterface $cacheRepository,
        ProductDatabaseRepositoryInterface $databaseRepository) {
        $this->cacheRepository = $cacheRepository;
        $this->databaseRepository = $databaseRepository;
    }

    /**
     * @param int $productId
     * @return mixed
     */
    public function findProductDetails(int $productId)
    {
        $productDetails = $this->cacheRepository->findById($productId);

        if (!empty($productDetails)) {
            return $productDetails;
        }

        return $this->databaseRepository->findById($productId);
    }
}
