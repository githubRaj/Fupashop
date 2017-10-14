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

    public function getDimensions() { return $this->$dimensions; }
    public function getTvType() { return $this->$tvType; }
    public function getResolution() { return $this->$resolution; }
    public function getScreenSize() { return $this->$screenSize; }

    public function setDimensions($dimensions) { $this->dimensions = $dimensions; }
    public function setTvType($tvType) { $this->tvType = $tvType; }
    public function setResolution($resolution) { $this->resolution = $resolution; }
    public function setScreenSize($screenSize) { $this->screenSize = $screenSize; }

    public function getAttributes()
    {
        return
        [
            'brandName' => $brandName,
            'dimensions' => $dimensions,
            'weight' => $weight,
            'tvType' => $tvType,
            'modelNumber' => $modelNumber,
            'price' => $price,
            'resolution' => $resolution,
            'screenSize' => $screenSize,
        ];
    }
}
