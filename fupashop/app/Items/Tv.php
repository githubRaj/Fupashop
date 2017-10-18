<?php

namespace App\Items;
use App\Items\Item;

class Tv extends Item
{
    private $dimensions;
    private $tvType;
    private $resolution;
    private $screenSize;

    public function __construct($brandName, $dimensions, $weight, $tvType, $modelNumber, $price, $resolution, $screenSize )
    {
        $this->brandName = $brandName;
        $this->dimensions = $dimensions;
        $this->weight = $weight;
        $this->tvType = $tvType;
        $this->modelNumber = $modelNumber;
        $this->price = $price;
        $this->resolution = $resolution;
        $this->screenSize = $screenSize;
    }

    public function getDimensions() { return $this->dimensions; }
    public function getTvType() { return $this->tvType; }
    public function getResolution() { return $this->resolution; }
    public function getScreenSize() { return $this->screenSize; }

    public function setDimensions($dimensions) { $this->dimensions = $dimensions; }
    public function setTvType($tvType) { $this->tvType = tvType; }
    public function setResolution($resolution) { $this->resolution = $resolution; }
    public function setScreenSize($screenSize) { $this->screenSize = $screenSize; }
    public function setAll($new){
        $this->brandName = $new['brandName'];
        $this->dimensions = $new['dimensions'];
        $this->weight = $new['weight'];
        $this->tvType = $new['tvType'];
        $this->modelNumber = $new['modelNumber'];
        $this->price = $new['price'];
        $this->resolution = $new['resolution'];
        $this->screenSize = $new['screenSize'];
    }

    public function getAttributes()
    {
        return
        [
            'brandName' => $this->brandName,
            'dimensions' => $this->dimensions,
            'weight' => $this->weight,
            'tvType' => $this->tvType,
            'modelNumber' => $this->modelNumber,
            'price' => $this->price,
            'resolution' => $this->resolution,
            'screenSize' => $this->screenSize
        ];
    }
}
