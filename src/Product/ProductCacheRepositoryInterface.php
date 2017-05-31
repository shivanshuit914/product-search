<?php

namespace Product;


interface ProductCacheRepositoryInterface
{
    public function findById(int $id);

    public function add(Product $product);
}