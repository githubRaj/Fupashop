<?php

namespace App\Items;

class Desktop extends Item
{
	protected $processor;
	protected $dimensions;
	protected $ramSize;
	protected $cpuCores;
	protected $hddSize;

	public function __construct($modelNumber, $processor, $dimensions, $ramSize, $weight, $cpuCores, $hddSize, $brandName, $price);
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

    public function getProcessor() { return $this->$processor; }
    public function getDimensions() { return $this->$dimensions; }
    public function getRamSize() { return $this->$ramSize; }
    public function getCpuCores() { return $this->$cpuCores; }
    public function getHddSize() { return $this->$hddSize; }

    public function setProcessor($processor) { $this->processor = $processor; }
    public function setDimensions($dimensions) { $this->dimensions = $dimensions; }
    public function setRamSize($ramSize) { $this->ramSize = $ramSize; }
    public function setCpuCores($cpuCores) { $this->cpuCores = $cpuCores; }
    public function setHddSize($hddSize) { $this->hddSize = $hddSize; }

    public function getAttributes()
    {
        return
        [
            'modelNumber' => $modelNumber,
            'processor' => $processor,
            'dimensions' => $dimensions,
            'ramSize' => $ramSize,
            'weight' => $weight,
            'cpuCores' => $cpuCores,
            'hddSize' => $hddSize,
            'brandName' => $brandName,
            'price' => $price
        ];
    }
}

