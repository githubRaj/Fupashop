<?php

namespace App\Items;

class Monitor extends Item
{
    protected $size;

    public function __construct($modelNumber, $size, $weight, $brandName, $price)
    {
        $this->modelNumber = $modelNumber;
        $this->size = $size;
        $this->weight = $weight;
        $this->brandName = $brandName;
        $this->price = $price;
    }

    public function getSize() { return $this->$size; }

    public function setSize($size) { $this->size = $size; }

    public function getAttributes()
    {
        return
        [
            'modelNumber' => $modelNumber,
            'size' => $size,
            'weight' => $weight,
            'brandName' => $brandName,
            'price' => $price,
        ];
    }
}
