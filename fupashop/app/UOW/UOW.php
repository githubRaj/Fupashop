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
    if ($this->isNotRegistered($item))
      array_push($this->newItems, $item);
    // else
      // TODO: Error message about already being in newItems so you can't do whatever you want to do
  }

  // Add item to dirtyItems
  public function registerDirty($item)
  {
    if ($this->isNotRegistered($item))
      array_push($this->dirtyItems, $item);
    // else
      // TODO: Error message about already being in dirtytems so you can't do whatever you want to do
  }

  // Add item to deletedItems
  public function registerDeleted($item)
  {
    if ($this->isNotRegistered($item))
      array_push($this->deletedItems, $item);
    // else
      // TODO: Error message about already being in deletedItems so you can't do whatever you want to do
  }

  // Check if item is already registered
  public function isNotRegistered($item)
  {
    $registeredItems = array_merge($this->newItems, $this->dirtyItems, $this->deletedItems);

    foreach ($registeredItems as $registeredItem)
    {
      if ($registeredItem->getModelNumber() == $item->getModelNumber())
        return false;
    }

    return true;
  }

  public function commit()
  {
    // Send command to pass new items to be inserted to TDG
    foreach ($this->newItems as $item)
      $this->mapper->saveNewItem($item);

    // Send command to pass dirty items to be updated to TDG
    foreach ($this->dirtyItems as $item)
      $this->mapper->saveDirtyItem($item);

    // Send command to pass deleted items to be updated to TDG
    foreach ($this->deletedItems as $item)
      $this->mapper->saveDeletedItem($item);

    // Reset arrays
    $this->resetArrays();
  }

  protected function resetArrays()
  {
    // Reinitialize arrays
    $this->newItems = array();
    $this->dirtyItems = array();
    $this->deletedItems = array();
  }

  // Maybe add rollback stuff
}
