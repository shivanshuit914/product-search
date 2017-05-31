<?php

namespace Product;

interface ProductDatabaseRepositoryInterface
{
    /**
     * @param string $productId
     * @return Product
     */
    public function findById(string $productId);

    /**
     * @param Product $product
     */
    public function add(Product $product);
}