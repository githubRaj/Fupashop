<?php

namespace App\Mapper;
use App\UOW\UOW;
use App\TDG\TableDataGateway;
use App\Repository;
use App\Items\Item;
use App\Items\Tablet;
use App\Items\Monitor;
use App\Items\Desktop;
use App\Items\Laptop;
use App\Items\SerialNumber;
use Session;

class Mapper
{
	protected $tdg;
	protected $uow;
	protected $repo;

	public function __construct()
	{
		$this->tdg = new TableDataGateway();
		$this->repo = new Repository();
		$this->uow = new UOW($this);
	}

	public function addToCart( $itemModelNum )
	{
		// Get the item via mapper
		$item = Mapper::findItemByModelNumber( $itemModelNum, 'App\Items\Tablet' );
		// Get the the cart from the repo via session
		// And add the item to the cart
		session()->get('repo')->getCart()->addItemToCart( $item );

	}

	public function createItemInstance($itemAttributes, $className)
	{
		switch($className)
		{
			case 'App\Items\Tablet':
				return new Tablet($itemAttributes->modelNumber, $itemAttributes->processor, $itemAttributes->screenSize, $itemAttributes->dimensions, $itemAttributes->ramSize, $itemAttributes->weight, $itemAttributes->cpucores, $itemAttributes->hddSize, $itemAttributes->batteryInformation, $itemAttributes->brandName, $itemAttributes->operatingSystem, $itemAttributes->cameraInformation, $itemAttributes->price);
				break;
			case'App\Items\Desktop':
				return new Desktop($itemAttributes->modelNumber, $itemAttributes->processor, $itemAttributes->dimensions, $itemAttributes->ramSize, $itemAttributes->weight, $itemAttributes->cpuCores, $itemAttributes->hddSize, $itemAttributes->brandName, $itemAttributes->price);
				break;
			case'App\Items\Monitor':
				return new Monitor($itemAttributes->modelNumber, $itemAttributes->size, $itemAttributes->weight, $itemAttributes->brandName, $itemAttributes->price);
				break;
			case 'App\Items\Laptop':
				return new Laptop($itemAttributes->modelNumber, $itemAttributes->processor, $itemAttributes->displaySize, $itemAttributes->ramSize, $itemAttributes->weight, $itemAttributes->cpuCores, $itemAttributes->hddSize, $itemAttributes->batteryType, $itemAttributes->batteryInformation, $itemAttributes->brandName, $itemAttributes->operatingSystem, $itemAttributes->touchFeature, $itemAttributes->cameraInformation, $itemAttributes->price);
				break;
			case 'App\Items\SerialNumber':
				return new SerialNumber($itemAttributes->modelNumber, $itemAttributes->serialNumber, $itemAttributes->type, $itemAttributes->purchasable);
				break;

		}

		return null;
	}

	public function findItemByModelNumber($modelNumber, $className)
	{
		$repoItem = $this->repo->getItemByModelNumber($modelNumber, $className);
		if ($repoItem != null)
		{
			//found in repo
			return $repoItem;
		}
		else
		{
			// look in db
			$itemAttributes = $this->tdg->getItemByModelNumber($modelNumber, $className);

			if ($itemAttributes != null)
			{
				$item = $this->createItemInstance($itemAttributes, $className);

				if ($item != null)
				{
					$this->repo->addItem($item);
					return $item;
				}
			}
		}

		return null;
	}

	public function setItem($newItem, $modelNumber)
	{
		if ($this->findItemByModelNumber($modelNumber, get_class($newItem)) != null)
		{
			$this->repo->updateItem($newItem, $modelNumber);
			$this->uow->registerDirty($newItem);
			$this->uow->commit();
		}
	}

	public function eraseItem($item)
	{
		if ($item != null)
		{
			$this->repo->deleteItem($item);
			$this->uow->registerDeleted($item);
			$this->uow->commit();
		}
	}

	public function makeNewItem($itemAttributes, $className)
	{
    $item = createItemInstance($itemAttributes, $className);

		$this->repo->addItem($item);
		$this->uow->registerNew($item);
		$this->uow->commit();
	}

  public function findAllItemsByClass($className)
  {
    $objArray = array();
    // No Tablets found in repo. load all from db to repo
    //if ($this->repo->classArrayEmpty($className))
    if (true)
    {
      $itemArray = $this->tdg->getAllItemsByClass($className);

      foreach ($itemArray as $itemAttributes)
      {
        $item = $this->createItemInstance($itemAttributes, $className);

        array_push($objArray, $item);
        $this->repo->addItem($item);
      }

      return $objArray;
    }
    else
    {
      // Case where some are in the repo but not all
    }
  }

	public function saveNewItem($item)
	{
		$this->tdg->insertItem($item);
	}

	public function saveDirtyItem($item)
	{
		$this->tdg->updateItem($item);
	}

	public function saveDeletedItem($item)
	{
		$this->tdg->deleteItem($item);
	}
}
