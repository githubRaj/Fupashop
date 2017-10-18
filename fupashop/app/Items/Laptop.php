<?php

namespace App\Items;
use App\Items\Item;

class Laptop extends Item
{
  private $processor;
	private $displaySize;
	private $ramSize;
	private $cpuCores;
	private $hddSize;
	private $batteryType;
	private $batteryInformation;
	private $operatingSystem;
	private $touchFeature;
	private $cameraInformation;

    public function __construct($modelNumber, $processor, $displaySize, $ramSize, $weight, $cpuCores, $hddSize, $batteryType, $batteryInformation, $brandName, $operatingSystem, $touchFeature, $cameraInformation, $price)
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


	public function getProcessor() { return $this->processor; }
	public function getDisplaySize() { return $this->displaySize; }
	public function getRamSize() { return $this->ramSize; }
	public function getCpuCores() { return $this->cpuCores; }
	public function getHddSize() { return $this->hddSize; }
	public function getBatteryType() { return $this->batteryType; }
	public function getBatteryInformation() { return $this->batteryInformation; }
	public function getOperatingSystem() { return $this->operatingSystem; }
	public function getTouchFeature() { return $this->touchFeature; }
	public function getCameraInformation() { return $this->cameraInformation; }

	public function setProcessor($processor) { $this->processor = $processor; }
	public function setDisplaySize($displaySize) { $this->displaySize = $displaySize; }
	public function setRamSize($ramSize) { $this->ramSize = $ramSize; }
	public function setCpuCores($cpuCores) { $this->cpuCores = $cpuCores; }
	public function setBatteryType($batteryType) { $this->batteryType = $batteryType; }
	public function setBatteryInformation($batteryInformation) { $this->batteryInformation = $batteryInformation; }
	public function setOperatingSystem($operatingSystem) { $this->operatingSystem = $operatingSystem; }
	public function setTouchFeature($touchFeature) { $this->touchFeature = $touchFeature; }
	public function setCameraInformation($cameraInformation) { $this->cameraInformation = $cameraInformation; }
  public function setAll($new){
      $this->modelNumber = $new['modelNumber'];
      $this->processor = $new['processor'];
      $this->displaySize = $new['displaySize'];
      $this->ramSize = $new['ramSize'];
      $this->weight = $new['weight'];
      $this->cpuCores = $new['cpuCores'];
      $this->hddSize = $new['hddSize'];
      $this->batteryType = $new['batteryType'];
      $this->batteryInformation = $new['batteryInformation'];
      $this->brandName = $new['brandName'];
      $this->operatingSystem = $new['operatingSystem'];
      $this->touchFeature = $new['touchFeature'];
      $this->cameraInformation = $new['cameraInformation'];
      $this->price = $new['price'];
  }

    public function getAttributes()
    {
        return
        [
            'modelNumber' => $this->modelNumber,
            'processor' => $this->processor,
            'displaySize' => $this->displaySize,
            'ramSize' => $this->ramSize,
            'weight' => $this->weight,
            'cpuCores' => $this->cpuCores,
            'hddSize' => $this->hddSize,
            'batteryType' => $this->batteryType,
            'batteryInformation' => $this->batteryInformation,
            'brandName' => $this->brandName,
            'operatingSystem' => $this->operatingSystem,
            'touchFeature' => $this->touchFeature,
            'cameraInformation' => $this->cameraInformation,
            'price' => $this->price
        ];
    }
}
