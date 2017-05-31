<?php

namespace Product;

interface ProductDatabaseRepositoryInterface
{
    /**
     * @param int $productId
     * @return mixed
     */
    public function findById(int $productId);
}