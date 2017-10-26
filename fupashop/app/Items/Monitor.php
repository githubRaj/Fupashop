<?php

namespace App\Items;
use App\Items\Item;
class Monitor extends Item
{
    private $size;

    public function __construct($modelNumber, $size, $weight, $brandName, $price)
    {
        $this->modelNumber = $modelNumber;
        $this->size = $size;
        $this->weight = $weight;
        $this->brandName = $brandName;
        $this->price = $price;
    }

    public function getSize() { return $this->size; }

    public function setSize($size) { $this->size = $size; }
   
    public function setAttributes($newAttributes)
    {
        $this->modelNumber = $newAttributes['modelNumber'];
        $this->size = $newAttributes['size'];
        $this->weight = $newAttributes['weight'];
        $this->brandName = $newAttributes['brandName'];
        $this->price = $newAttributes['price'];
    }

    public function getAttributes()
    {
        return
        [
            'modelNumber' => $this->modelNumber,
            'size' => $this->size,
            'weight' => $this->weight,
            'brandName' => $this->brandName,
            'price' => $this->price
        ];
    }
}
