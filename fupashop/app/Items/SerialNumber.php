<?php

namespace App\Items;

use App\Items\Item;

class SerialNumber
{
    // Attributes that apply to all items are in superclass Item
	private $type;
	private $serialNumber;
	private $purchasable;
	private $modelNumber;

    public function __construct($modelNumber, $serialNumber, $type, $purchasable)
	{
		$this->modelNumber = $modelNumber;
		$this->serialNumber = $serialNumber;
		$this->type = $type;
		$this->purchasable = $purchasable;
	}


	public function getSerialNumber() { return $this->serialNumber; }
	public function getType() { return $this->type; }
	public function getPurchasable() { return $this->purchasable; }
	public function getModelNumber() { return $this->modelNumber; }

	// Setters
	public function setSerialNumber($serialNumber) { $this->serialNumber = $serialNumber; }
	public function setType($type) { $this->type = $type; }
	public function setPurchasable($purchasable) { $this->purchasable = $purchasable; }


	public function setAttributes($newAttributes)
	{
			$this->type = $newAttributes['type'];
			$this->purchasable = $newAttributes['purchasable'];
	}

	public function getAttributes()
	{
		return
		[
			'modelNumber' => $this->modelNumber,
			'serialNumber' => $this->serialNumber,
			'type' => $this->type,
			'purchasable' => $this->purchasable
		];
	}
}
