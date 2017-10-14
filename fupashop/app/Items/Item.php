<?php

namespace App\Items;
use Illuminate\Database\Eloquent\Model;
//use Tablet;

class Item
{
	// Attributes

	protected $modelNumber;
	protected $brandName;
	protected $price;
	protected $weight;
	protected $type;

	// Getters
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
}
