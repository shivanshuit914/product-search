<?php

namespace Product;


interface ProductCacheRepositoryInterface
{
    /**
     * @param string $id
     * @return Product
     */
    public function findById(string $id);

    /**
     * @param Product $product
     */
    public function add(Product $product);

    /**
     * @param Product $product
     */
    public function update(Product $product);

    /**
     * @param string $id
     */
    public function delete(string $id);
}