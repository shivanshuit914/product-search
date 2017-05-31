<?php

namespace Repository;

use Exception;
use Product\Product;
use Product\ProductCacheRepositoryInterface;

class FileSystemCacheRepository implements ProductCacheRepositoryInterface
{
    /**
     * @param string $id
     * @return bool|mixed
     */
    public function findById(string $id)
    {
        $cacheFile = $this->getFilePath($id);
        if (!file_exists($cacheFile)) {
            return false;
        }

        $data = file_get_contents($cacheFile);

        if (empty($data)) {
            return false;
        }

        return unserialize($data);
    }

    /**
     * @param string $id
     * @return string
     */
    private function getFilePath(string $id)
    {
        return __DIR__ . '/../../cache/product_' . $id;
    }

    /**
     * @param Product $product
     * @throws Exception
     */
    public function add(Product $product)
    {
        $fileHandler = fopen($this->getFilePath($product->getId()), 'w');
        if (empty($fileHandler)) {
            throw new Exception('can not open cache file');
        }

        if (empty(fwrite($fileHandler, serialize($product)))) {
            throw new Exception('Can not write to cache');
        }

        fclose($fileHandler);
    }

    public function update(Product $product)
    {
        $cacheFile = $this->getFilePath($product->getId());

        if (file_exists($cacheFile)) {
            unlink($cacheFile);
        }

        $this->add($product);
    }

    public function delete(string $id)
    {
        $cacheFile = $this->getFilePath($id);
        if (file_exists($cacheFile)) {
            unlink($cacheFile);
        }
    }
}