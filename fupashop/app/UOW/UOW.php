<?php

namespace App\UOW;

use App\Items\Item;
use App\Mapper\Mapper;

class UOW
{
  protected $newItems = array();
  protected $dirtyItems = array();
  protected $deletedItems = array();
  protected $mapper;

  public function __construct($mapper)
  {
    $this->mapper = $mapper;
  }

  // Add item to newItems
  public function registerNew($item)
  {
    if (isNotRegistered($item))
      array_push($newItems, $item);
    // else
      // TODO: Error message about already being in newItems so you can't do whatever you want to do
  }

  // Add item to dirtyItems
  public function registerDirty($item)
  {
    if (isNotRegistered($item))
      array_push($dirtyItems, $item);
    // else
      // TODO: Error message about already being in dirtytems so you can't do whatever you want to do
  }

  // Add item to deletedItems
  public function registerDeleted($item)
  {
    if (isNotRegistered($item))
      array_push($deletedItems, $item);
    // else
      // TODO: Error message about already being in deletedItems so you can't do whatever you want to do
  }

  // Check if item is already registered
  public function isNotRegistered($item)
  {
    $registeredItems = array_merge($newItems, $dirtyItems, $deltedItems);
    
    foreach ($registeredItems as $registeredItem)
    {
      if ($registeredItem->modelNumer == $item->modelNumer)
        return false;
    }

    return true;
  }

  public function commit()
  {
    // Send command to pass new items to be inserted to TDG
    foreach ($newItems as $item) 
      $this->mapper->saveNewItem($item);

    // Send command to pass dirty items to be updated to TDG
    foreach ($dirtyItems as $item) 
      $this->mapper->saveDirtyItem($item);

    // Send command to pass deleted items to be updated to TDG
    foreach ($deletedItems as $item) 
      $this->mapper->saveDeletedItem($item);

    // Reset arrays
    resetArrays();
  }

  protected function resetArrays()
  {
    // Clear arrays
    array_unset($this->$newItems);
    array_unset($this->$dirtytems);
    array_unset($this->$deletedtems);

    // Reset arrays
    $this->$newItems = array();
    $this->$dirtyItems = array();
    $this->$deletedItems = array();
  }
}