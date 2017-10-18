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
    public function setAll($new){
        $this->modelNumber = $new['modelNumber'];
        $this->size = $new['size'];
        $this->weight = $new['weight'];
        $this->brandName = $new['brandName'];
        $this->price = $new['price'];
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
