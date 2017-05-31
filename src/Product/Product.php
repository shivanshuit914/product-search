<?php

namespace Product;

class Product
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var array
     */
    private $details;

    /**
     * @var int
     */
    private $searchCount = 0;

    /**
     * Product constructor.
     * @param string $id
     */
    private function __construct(string $id)
    {
        $this->id = $id;
    }

    public static function withId(string $id) : Product
    {
        return new static($id);
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function hasDetails(array $details)
    {
        $this->details = $details;
    }

    public function getDetails() : array
    {
        return $this->details;
    }

    public function incrementSearchCount() : void
    {
        $this->searchCount++;
    }

    public function getSearchCount() : int
    {
        return $this->searchCount;
    }
}
