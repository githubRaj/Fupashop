<?php

namespace App;
use App\Items\Desktop;
use App\Items\Laptop;
use App\Items\Monitor;
use App\Items\Tablet;
use App\Items\SerialNumber;

use Session; // Attempt at repo persistence

class Repository
{
  private $itemRepo;  // 2D array of items

	public function __construct()
	{
    // First dimension / Primary key: ::class
    $this->itemRepo = array();

    // 2nd dimension / Secondary key: Row of items stored by key modelNumber
    $this->itemRepo[Tablet::class] = array();
    $this->itemRepo[Desktop::class] = array();
    $this->itemRepo[Monitor::class] = array();
    $this->itemRepo[Laptop::class] = array();
    $this->itemRepo[SerialNumber::class] = array();

   // $tests = Session::get('repo');
    
    //echo $tests;
  }

	// Parameter $item as an instantiated Item subclass object
	public function addItem($item)
	{
		$class = get_class($item);
		if($class != 'SerialNumber')
		{
			$modelNumber = $item->getModelNumber();
		}
    	else
    	{
    		$serialNumber = $item->getSerialNumber();
    	}
    	

    // Add item at index [className][modelNumber]
	  	if (!$this->itemExists($this->itemRepo[$class], $modelNumber))
	    {
	      $this->itemRepo[$class][$modelNumber] = array();
	      array_push($this->itemRepo[$class][$modelNumber], $item);
	    }
	    
	    elseif(!$this->serialItemExists($this->itemRepo[$class], $modelNumber, $serialNumber))
	    {
	      $this->itemRepo[$class][$serialNumber] = array();
	      array_push($this->itemRepo[$class][$serialNumber], $item);
	    }

    //Session::put('repo', $this->itemRepo[$class]);
	}

	public function deleteItem($item)
	{
		$class = get_class($item);
    	$modelNumber = $item->getModelNumber();

		if ($this->itemExists($this->itemRepo[$class], $modelNumber))
			array_pop($this->itemRepo[$class][$modelNumber]);
	}

	public function updateItem($newItem, $modelNumber)
	{
		$class = get_class($newItem);

		$oldItem = $this->getItemByModelNumber($modelNumber, $class);
		$oldItem[0]->setAttributes($newItem->getAttributes());
	}

	public function getItemByModelNumber($modelNumber, $className)
	{
    if ($this->itemExists($this->itemRepo[$className], $modelNumber))
		  return $this->itemRepo[$className][$modelNumber];
    else
      return null;
	}
	public function getItemBySerialNumber($serialNumber, $className)
	{
    if ($this->itemExists($this->itemRepo[$className], $serialNumber))
		  return $this->itemRepo[$className][$serialNumber];
    else
      return null;
	}

	public function getAllItemsByClass($className)
	{
		return $this->itemRepo[$className];
	}

	public function itemExists($repoRow, $modelNumber)
	{
    // repoRow is $itemRepo[$className] and this returns existence of $itemRepo[$className][$modelNumber]
		return isset($repoRow[$modelNumber]);// == null;
	}
	public function serialItemExists($repoRow, $modelNumber, $serialNumber)
	{
    // repoRow is $itemRepo[$className] and this returns existence of $itemRepo[$className][$modelNumber]
		return isset($repoRow[$modelNumber]);// == null;
	}

	public function classArrayEmpty($className)
	{
		return empty($this->itemRepo[$className]);
	}
}
