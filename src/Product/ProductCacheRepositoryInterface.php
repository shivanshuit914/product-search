<?php

namespace Product;


interface ProductCacheRepositoryInterface
{
    public function findById(string $id);

    public function add(Product $product);

    public function update(Product $product);

    public function delete(string $id);
}