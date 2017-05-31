<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Controller\ProductController;
use Product\Product;
use Product\ProductFinder;
use Repository\DatabaseRepository;
use Repository\FileSystemCacheRepository;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * @var array
     */
    private $productDetails = [];

    /**
     * @var FileSystemCacheRepository
     */
    private $fileSystemRepository;

    /**
     * @var DatabaseRepository
     */
    private $databaseRepository;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->fileSystemRepository = new FileSystemCacheRepository();
        $this->databaseRepository = new DatabaseRepository();
    }

    /**
     * @Given there is a product with identification :id
     */
    public function thereIsAProductWithIdentification(string $id)
    {
        $product = Product::withId($id);
        $product->hasDetails(['name' => 'product 1', 'price' => 100]);
        $this->fileSystemRepository->add($product);
        $product->incrementSearchCount();
        $this->databaseRepository->add($product);
    }

    /**
     * @When I search for details of product with identification :id
     */
    public function iSearchForDetailsOfProductWithIdentification(string $id)
    {
        $productController = new ProductController($this->fileSystemRepository, $this->databaseRepository);
        $this->productDetails = json_decode($productController->getDetails($id), true);
    }

    /**
     * @Then I should receive product details as below:
     */
    public function iShouldReceiveProductDetailsAsBelow(TableNode $table)
    {
        $column = $table->getColumnsHash();
        PHPUnit_Framework_Assert::assertEquals($column[0]['name'], $this->productDetails['data']['name']);
    }

    /**
     * @Then will increase product :id search count to :searchCount
     */
    public function willIncreaseProductSearchCountTo(string $id, int $searchCount)
    {
        $product = $this->fileSystemRepository->findById($id);
        PHPUnit_Framework_Assert::assertEquals($searchCount, $product->getSearchCount());
    }

    /**
     * @Given product :id is not exists in to the cache
     */
    public function productIsNotExistsInToTheCache(string $id)
    {
        $this->fileSystemRepository->delete($id);
    }

    /**
     * @Then will create cache record for product :id
     */
    public function willCreateCacheRecordForProduct(string $id)
    {
        $product = $this->fileSystemRepository->findById($id);
        PHPUnit_Framework_Assert::assertEquals($id, $product->getId());
    }

}
