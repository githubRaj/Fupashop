<?php

namespace App\Items;

use App\Items\Item;

class Tablet extends Item
{
    // Attributes that apply to all items are in superclass Item
	protected $processor;
	protected $screensize;
	protected $dimensions;
	protected $ramSize;
	protected $cpucores;
	protected $hddSize;
	protected $operatingSystem;
	protected $cameraInformation;

    public function __construct($modelNumber, $processor, $screensize, $dimensions, $ramSize, $weight, $cpucores, $hddSize, $batteryInformation, $brandName, $operatingSystem, $cameraInformation, $price)
	{
		$this->modelNumber = $modelNumber;
		$this->processor = $processor;
		$this->screensize = $screensize;
		$this->dimensions = $dimensions;
		$this->ramSize = $ramSize;
		$this->weight = $weight;
		$this->cpucores = $cpucores;
		$this->hddSize = $hddSize;
		$this->batteryInformation = $batteryInformation;
		$this->brandName = $brandName;
		$this->operatingSystem = $operatingSystem;
		$this->cameraInformation = $cameraInformation;
		$this->price = $price;
	}


	public function getScreensize() { return $this->$screensize; }
	public function getDimensions() { return $this->$dimensions; }
	public function getRamSize() { return $this->$ramSize; }
	public function getCpucores() { return $this->$cpucores; }
	public function getHddSize() { return $this->$hddSize; }
	public function getBatteryInformation() { return $this->$batteryInformation; }
	public function getOperatingSystem() { return $this->$operatingSystem; }
	public function getCameraInformation() { return $this->$cameraInformation; }


	// Setters
	public function setScreensize($screensize) { $this->screensize = $screensize; }
	public function setDimensions($dimensions) { $this->dimensions = $dimensions; }
	public function setRamSize($ramSize) { $this->ramSize = $ramSize; }
	public function setCpucores($cpucores) { $this->cpucores = $cpucores; }
	public function setHddSize($hddSize) { $this->hddSize = $hddSize; }
	public function setBatteryInformation($batteryInformation) { $this->batteryInformation = $batteryInformation; }
	public function setOperatingSystem($operatingSystem) { $this->operatingSystem = $operatingSystem; }
	public function setCameraInformation($cameraInformation) { $this->cameraInformation = $cameraInformation; }


	public function getAttributes()
	{
		return
		[
			'modelNumber' => $modelNumber,
			'processor' => $processor,
			'screensize' => $screensize,
			'dimensions' => $dimensions,
			'ramSize' => $ramSize,
			'weight' => $weight,
			'cpucores' => $cpucores,
			'hddSize' => $hddSize,
			'batteryInformation' => $batteryInformation,
			'brandName' => $brandName,
			'operatingSystem' => $operatingSystem,
			'cameraInformation' => $cameraInformation,
			'price' => $price
		];
	}
}
