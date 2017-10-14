<?php

namespace App\Items;

use App\Items\Item;

class Tablet extends Item
{
    // Attributes that apply to all items are in superclass Item
	protected $processor;
	protected $screenSize;
	protected $dimensions;
	protected $ramSize;
	protected $cpucores;
	protected $hddSize;
	protected $operatingSystem;
	protected $cameraInformation;

    public function __construct($modelNumber, $processor, $screenSize, $dimensions, $ramSize, $weight, $cpucores, $hddSize, $batteryInformation, $brandName, $operatingSystem, $cameraInformation, $price)
	{
		$this->modelNumber = $modelNumber;
		$this->processor = $processor;
		$this->screenSize = $screenSize;
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


	public function getScreenSize() { return $this->screenSize; }
	public function getProcessor() { return $this->processor; }
	public function getDimensions() { return $this->dimensions; }
	public function getRamSize() { return $this->ramSize; }
	public function getCpucores() { return $this->cpucores; }
	public function getHddSize() { return $this->hddSize; }
	public function getBatteryInformation() { return $this->batteryInformation; }
	public function getOperatingSystem() { return $this->operatingSystem; }
	public function getCameraInformation() { return $this->cameraInformation; }


	// Setters
	public function setScreenSize($screenSize) { $this->screenSize = $screenSize; }
	public function setProcessor($processor) { $this->processor = $processor; }
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
			'modelNumber' => $this->$modelNumber,
			'processor' => $this->$processor,
			'screenSize' => $this->$screenSize,
			'dimensions' => $this->$dimensions,
			'ramSize' => $this->$ramSize,
			'weight' => $this->$weight,
			'cpucores' => $this->$cpucores,
			'hddSize' => $this->$hddSize,
			'batteryInformation' => $this->$batteryInformation,
			'brandName' => $this->$brandName,
			'operatingSystem' => $this->$operatingSystem,
			'cameraInformation' => $this->$cameraInformation,
			'price' => $this->$price
		];
	}
}
