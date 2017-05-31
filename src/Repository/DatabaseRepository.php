<?php

namespace Repository;

use Product\Product;
use Product\ProductDatabaseRepositoryInterface;

// this needs to replace with mysql or elasticsearch repository.
class DatabaseRepository implements ProductDatabaseRepositoryInterface
{
    /**
     * @var Product[]
     */
    private $products = [];

    public function __construct()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function findById(string $productId) : Product
    {
        foreach ($this->products as $product) {
            if ($product->getId() == $productId) {
                return $product;
            }
        }
    }

    public function add(Product $product)
    {
        $this->products[] = $product;
    }
}