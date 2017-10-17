<?php

namespace App\Items;
use App\Items\Item;

class Desktop extends Item
{
	private $processor;
	private $dimensions;
	private $ramSize;
	private $cpuCores;
	private $hddSize;

	public function __construct($modelNumber, $processor, $dimensions, $ramSize, $weight, $cpuCores, $hddSize, $brandName, $price)
	{
		$this->modelNumber = $modelNumber;
		$this->processor = $processor;
		$this->dimensions = $dimensions;
		$this->ramSize = $ramSize;
		$this->weight = $weight;
		$this->cpuCores = $cpuCores;
		$this->hddSize = $hddSize;
		$this->brandName = $brandName;
		$this->price = $price;
	}

    public function getProcessor() { return $this->processor; }
    public function getDimensions() { return $this->dimensions; }
    public function getRamSize() { return $this->ramSize; }
    public function getCpuCores() { return $this->cpuCores; }
    public function getHddSize() { return $this->hddSize; }

    public function setProcessor($processor) { $this->processor = $processor; }
    public function setDimensions($dimensions) { $this->dimensions = $dimensions; }
    public function setRamSize($ramSize) { $this->ramSize = $ramSize; }
    public function setCpuCores($cpuCores) { $this->cpuCores = $cpuCores; }
    public function setHddSize($hddSize) { $this->hddSize = $hddSize; }
    public function setAll($new){
        $this->modelNumber = $new['modelNumber'];
        $this->processor = $new['processor'];
        $this->dimensions = $new['dimensions'];
        $this->ramSize = $new['ramSize'];
        $this->weight = $new['weight'];
        $this->cpuCores = $new['cpuCores'];
        $this->hddSize = $new['hddSize'];
        $this->brandName = $new['brandName'];
        $this->price = $new['price'];
    }

    public function getAttributes()
    {
        return
        [
            'modelNumber' => $this->modelNumber,
            'processor' => $this->processor,
            'dimensions' => $this->dimensions,
            'ramSize' => $this->ramSize,
            'weight' => $this->weight,
            'cpuCores' => $this->cpuCores,
            'hddSize' => $this->hddSize,
            'brandName' => $this->brandName,
            'price' => $this->price
        ];
    }
}
