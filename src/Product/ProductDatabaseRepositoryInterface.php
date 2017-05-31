<?php

namespace Product;

interface ProductDatabaseRepositoryInterface
{
    /**
     * @param string $productId
     * @return Product
     */
    public function findById(string $productId);

    public function add(Product $product);
}