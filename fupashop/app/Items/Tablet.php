<?php

namespace App\Items;

use App\Items\Item;

class Tablet extends Item
{
    //protected $table = 'tablets';
    protected $fillable = [
        'modelNumber', 'brandName', 'price', 'weight','displaySize', 'dimensions', 'screenSize','ramSize','cpucores','hddSize','batteryInformation','operatingSystem','cameraInformation',
    ];

    // Attributes that apply to all items are in superclass Item
	protected $displaySize;
	protected $dimensions;
	protected $screenSize;
	protected $ramSize;
	protected $cpucores;
	protected $hddSize;
	protected $batteryInformation;
	protected $operatingSystem;
	protected $cameraInformation;
	protected $modelNumber;
	protected $brandName;
	protected $price;
	protected $weight;
	protected $type;

    public function __construct($modelNumber, $brandName, $price, $weight, $displaySize, $dimensions, $screenSize, $ramSize, $cpucores, $hddSize, $batteryInformation, $operatingSystem, $cameraInformation)
	{
		$this->modelNumber = $modelNumber;
		$this->brandName = $brandName;
		$this->price = $price;
		$this->weight = $weight;
		$this->displaySize = $displaySize;
		$this->dimensions = $dimensions;
		$this->screenSize = $screenSize;
		$this->ramSize = $ramSize;
		$this->cpucores = $cpucores;
		$this->hddSize = $hddSize;
		$this->batteryInformation = $batteryInformation;
		$this->operatingSystem = $operatingSystem;
		$this->cameraInformation = $cameraInformation;
	}

	public function getDisplaySize() { return $this->displaySize; }
	public function getDimensions() { return $this->dimensions; }
	public function getScreenSize() { return $this->screenSize; }
	public function getRamSize() { return $this->ramSize; }
	public function getCpucores() { return $this->cpucores; }
	public function getHddSize() { return $this->hddSize; }
	public function getBatteryInformation() { return $this->batteryInformation; }
	public function getOperatingSystem() { return $this->operatingSystem; }
	public function getCameraInformation() { return $this->cameraInformation; }
	public function getModelNumber() { return $this->modelNumber; }
	public function getBrandName() { return $this->brandName; }
	public function getPrice() { return $this->price; }
	public function getWeight() { return $this->weight; }
	public function setItemType() { return $this->type; }
	
	// Setters
	public function setModelNumber($modelNumber) { $this->modelNumber = $modelNumber; }
	public function setBrandName($brandName) { $this->brandName = $brandName; }
	public function setPrice($price) { $this->price = $price; }
	public function setWeight($weight) { $this->weight = $weight; }
	public function getItemType($type) {  $this->type = $type; }

	public function setDisplaySize($displaySize) { $this->displaySize = $displaySize; }
	public function setDimensions($dimensions) { $this->dimensions = $dimensions; }
	public function setScreenSize($screenSize) { $this->screenSize = $screenSize; }
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
			'brandName' => $brandName,
			'price' => $price,
			'weight' => $weight,
			'displaySize' => $displaySize,
			'dimensions' => $dimensions,
			'screenSize' => $screenSize,
			'ramSize' => $ramSize,
			'cpucores' => $cpucores,
			'hddSize' => $hddSize,
			'batteryInformation' => $batteryInformation,
			'operatingSystem' => $operatingSystem,
			'cameraInformation' => $cameraInformation
		];
	}
}
