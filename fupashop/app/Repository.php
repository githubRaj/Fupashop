<?php

namespace App;
use App\Items\Desktop;
use App\Items\Laptop;
use App\Items\Monitor;
use App\Items\Tablet;
use App\Items\SerialNumber;
use App\Cart;

use Session; // Attempt at repo persistence

class Repository
{
  private $itemRepo;  // 2D array of items
  private $cart;
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

    //Initialize
    $this->cart = new Cart();
    //echo $tests;
  }

	// Parameter $item as an instantiated Item subclass object
	public function addItem($item)
	{
		$class = get_class($item);
    if ( $class == SerialNumber::class )
    {
      $position = $item->getSerialNumber();
    }
    else {
      $position = $item->getModelNumber();
    }
    // Add item at index [className][modelNumber]
	   if (!$this->itemExists($this->itemRepo[$class], $position))
	     {
	       //$this->itemRepo[$class][$position] = array();
	       $this->itemRepo[$class][$position] = $item;
	    }

    //Session::put('repo', $this->itemRepo[$class]);
	}

	public function deleteItem($item)
	{
		$class = get_class($item);
    if ( $class == SerialNumber::class )
    {
      $position = $item->getSerialNumber();
    }
    else {
      $position = $item->getModelNumber();
    }

		if ($this->itemExists($this->itemRepo[$class], $position))
			unset($this->itemRepo[$class][$position]);
	}

	public function updateItem($newItem, $modelNumber)
	{
		$class = get_class($newItem);

		$oldItem = $this->getItemByModelNumber($modelNumber, $class);
		$oldItem->setAttributes($newItem->getAttributes());
	}

  public function updateItemBySerialNumber( $newItem, $modelNumber, $serialNumber )
  {
    $class = get_class( $newItem);

    $oldItem = $this->getItemBySerialNumber( $serialNumber, $class );
    $oldItem->setAttributes($newItem->getAttributes());
  }

	public function getItemByModelNumber($modelNumber, $className)
	{
    if ($this->itemExists($this->itemRepo[$className], $modelNumber))
		  return $this->itemRepo[$className][$modelNumber]; // need [0] to fix array issue. this will return item instead of array of item
    else
      return null;
	}

	public function getItemBySerialNumber($serialNumber, $className)
	{
	    if ($this->itemExists($this->itemRepo[$className], $serialNumber))
	    {
	    	return $this->itemRepo[$className][$serialNumber]; // need [0] to fix array issue. this will return item instead of array of item
		}
	    else
	      return null;
	}

  public function getSerialBySerialNumber( $serialNumber )
  {
    if ($this->itemExists($this->itemRepo[SerialNumber::class], $serialNumber))
    {
      return $this->itemRepo[SerialNumber::class][$serialNumber]; // need [0] to fix array issue. this will return item instead of array of item
  }
    else
      return null;
  }

  public function getAllSerialNumbersByModelNumber( $modelNumber )
  {
    $items = $this->itemRepo[SerialNumber::class];
    $tempArray = array();
    foreach( $items as $item )
    {
      if ($item->getModelNumber() == $modelNumber )
      {
        $tempArray[] = $item;
      }
    }
    return $tempArray;
  }

	public function getQuantityByModel($modelNumber, $className)
	{
    if ($this->itemExists($this->itemRepo[$className], $modelNumber))
		{
			return $this->itemRepo[$className][$modelNumber]->getStock();
		}
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

	public function classArrayEmpty($className)
	{
		return empty($this->itemRepo[$className]);
	}

  public function getCart()
  {
    return $this->cart;
  }
}
