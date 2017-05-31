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
     * Product constructor.
     * @param int $id
     */
    private function __construct(int $id)
    {
        $this->id = $id;
    }

    public static function withId(int $id) : Product
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
}
