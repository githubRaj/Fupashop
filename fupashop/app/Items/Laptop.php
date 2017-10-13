<?php

namespace App\Items;


class Laptop extends Item
{
    protected $modelNumber;
	protected $processor;
	protected $displaySize;
	protected $ramSize;
	protected $weight;
	protected $cpuCores;
	protected $hddSize;
	protected $batteryType;
	protected $batteryInformation;
	protected $brandName;
	protected $operatingSystem;
	protected $touchFeature	
	protected $cameraInformation;
	protected $price;

    public function __construct($modelNumber, $processor, $displaySize, $ramSize, $weight, $cpuCores, $hddSize, $batteryType, $batteryInformation, $brandName, $operatingSystem, $touchFeature, $price);
    {
        $this->modelNumber = $modelNumber;
        $this->processor = $processor;
        $this->displaySize = $displaySize;
        $this->ramSize = $ramSize;
        $this->weight = $weight;
        $this->cpuCores = $cpuCores;
        $this->hddSize = $hddSize;
        $this->batteryType = $batteryType;
        $this->batteryInformation = $batteryInformation;
        $this->brandName = $brandName;
        $this->operatingSystem = $operatingSystem;
        $this->touchFeature = $touchFeature;
        $this->cameraInformation = $cameraInformation;
        $this->price = $price;
    }

    public function getModelNumber() { return $this->$modelNumber; }
	public function getProcessor() { return $this->$processor; }
	public function getDisplaySize() { return $this->$displaySize; }
	public function getRamSize() { return $this->$ramSize; }
	public function getWeight() { return $this->$weight; }
	public function getCpuCores() { return $this->$cpuCores; }
	public function getHddSize() { return $this->$hddSize; }
	public function getBatteryType() { return $this->$batteryType; }
	public function getBatteryInformation() { return $this->$batteryInformation; }
	public function getBrandName() { return $this->$brandName; }
	public function getOperatingSystem() { return $this->$operatingSystem; }
	public function getTouchFeature() { return $this->$touchFeature; }
	public function getCameraInformation() { return $this->$cameraInformation; }
	public function getPrice() { return $this->$price; }

	public function setModelNumber($modelNumber) { $this->modelNumber = $modelNumber; }
	public function setProcessor($processor) { $this->processor = $processor; }
	public function setDisplaySize($displaySize) { $this->displaySize = $displaySize; }
	public function setRamSize($ramSize) { $this->ramSize = $ramSize; }
	public function setWeight($weight) { $this->weight = $weight; }
	public function setCpuCores($cpuCores) { $this->cpuCores = $cpuCores; }
	public function setHddSize($hddSize) { $this->hddSize = $hddSize; }
	public function setBatteryType($batteryType) { $this->batteryType = $batteryType; }
	public function setBatteryInformation($batteryInformation) { $this->batteryInformation = $batteryInformation; }
	public function setBrandName($brandName) { $this->brandName = $brandName; }
	public function setOperatingSystem($operatingSystem) { $this->operatingSystem = $operatingSystem; }
	public function setTouchFeature($touchFeature) { $this->touchFeature = $touchFeature; }
	public function setCameraInformation($cameraInformation) { $this->cameraInformation = $cameraInformation; }
	public function setPrice($price) { $this->price = $price; }


    public function getAttributes()
    {
        return
        [
            'modelNumber' => $modelNumber,
            'processor' => $processor,
            'displaySize' => $displaySize,
            'ramSize' => $ramSize,
            'weight' => $weight,
            'cpuCores' => $cpuCores,
            'hddSize' => $hddSize,
            'batteryType' => $batteryType,
            'batteryInformation' => $batteryInformation,
            'brandName' => $brandName,
            'operatingSystem' => $operatingSystem,
            'touchFeature' => $touchFeature,
            'price' => $price
        ];
    }
}

