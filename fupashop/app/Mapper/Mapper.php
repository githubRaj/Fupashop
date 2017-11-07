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
use Auth;


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
		session()->put('repo', $this->repo);
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
			//	echo var_dump($itemAttributes);
				//return;
				return new SerialNumber($itemAttributes->modelNumber, $itemAttributes->serialNumber, $itemAttributes->type, $itemAttributes->purchasable);
				break;
		}

		return null;
	}

	public function createTransactionInTable( $cartItems )
	{
		foreach( $cartItems as $item )
		{
			$targetSerial = null;
			$className = get_class( $item );
			$modelNum = $item->getModelNumber();
			$possibleSerials = $this->findSerialNumbersByModelNumber( $modelNum, $className );
			$idx = 0;
			foreach( $possibleSerials as $entry )
			{
				if ( $entry->getPurchasable() == false )
				{
					$targetSerial = $possibleSerials[$idx];
					break;
				}
				else
				{
					$idx++;
				}
			}
			if ( $targetSerial != null )
			{
				//Now that we have the target serial object, add this to trxn table
				$uid = Auth::id();
				$modelNumber = $targetSerial->getModelNumber();
				$serialNumber = $targetSerial->getSerialNumber();
				$price;
				foreach( session()->get('sessionCart') as $item )
				{
					if ( $item->getModelNumber() == $targetSerial->getModelNumber() )
					{
						$price = $item->getPrice();
					}
				}
				$this->tdg->addTransaction( $uid, $modelNumber, $serialNumber, $price );
			}
			else
			{
				echo "No Corresponding Serial Number Found for chosen item.";
			}
		}
	}

	public function getStockByModelNumber($modelNumber, $className)
	{

		$repoItem = session()->get('repo')->getQuantityByModel($modelNumber, $className);
		if ($repoItem == null)
		{
			// look in db
			$models = $this->tdg->getSerialNumbersByModelNumber($modelNumber);
		  //	echo var_dump();
		   //return;
			if ($models != null)
			{
				$this->setSerialNumbersInRepo($modelNumber, $className, $models);
			}
		}

		return null;
	}

	public function initializeItemStock($item, $className){
		$serialNumbers = session()->get('repo')->getAllSerialNumbersByModelNumber($item->getModelNumber());
		if ($serialNumbers == null)
		{
			$models = $this->tdg->getSerialNumbersByModelNumber($item->getModelNumber());
			 if ($models != null)
			 {
				 $this->setSerialNumbersInRepo($item->getModelNumber(), $className, $models);
			 }
		}
	}
	public function findSerialNumbersByModelNumber($modelNumber, $className)
	{
		 $serialNumbers = session()->get('repo')->getAllSerialNumbersByModelNumber($modelNumber);
		 if ($serialNumbers != null)
		{
			return $serialNumbers;
		}
		else  //get serial numbers from database
		{
			$models = $this->tdg->getSerialNumbersByModelNumber($modelNumber);
		 //	echo var_dump();
			//return;
		 if ($models != null)
		 {
			 $this->setSerialNumbersInRepo($modelNumber, $className, $models);
		 }
		}
		 return session()->get('repo')->getAllSerialNumbersByModelNumber($modelNumber);
	}

	public function setSerialNumbersInRepo($modelNumber, $className, $models){
		$serialName = 'App\Items\SerialNumber';
		$newItem = $this->findItemByModelNumber($modelNumber, $className);
		
		/*Single Model to many Serial*/
		$stock = 0;
		for ($i=0; $i < sizeof($models) ; $i++)
		{
			if($models[$i]->purchasable == 1)
				$stock+=1;
			$item = $this->createItemInstance($models[$i], $serialName);
			session()->get('repo')->addItem($item);
		}
		$newItem->setStock($stock);
		$this->setItem($newItem, $modelNumber);
		return;
	}

	public function updateSerialNumberInRepo( $snObject )
	{
		// snObject is the newly updated object to put back into the db
		if ( $snObject != null )
		{
			$this->setItemBySerialNumber( $snObject, $snObject->getModelNumber(), $snObject->getSerialNumber() );
		}
	}

	public function findItembySerialNumber($modelNumber, $serialNumber)
	{$serialName = 'App\Items\SerialNumber';

		$repoItem = session()->get('repo')->getItemBySerialNumber($modelNumber, $serialName);
		if ($repoItem != null)
		{
			return $repoItem;
		}
		else
		{
			// look in db
			$itemAttributes = $this->tdg->getItemBySerialNumber($modelNumber,$serialNumber);



			if ($itemAttributes != null)
			{
				$item = $this->createItemInstance($itemAttributes, $serialName);
				if ($item != null)
				{
					session()->get('repo')->addItem($item);
					return $item;
				}
			}
		}

		return null;
	}

	public function findItemByModelNumber($modelNumber, $className)
	{
		$repoItem = session()->get('repo')->getItemByModelNumber($modelNumber, $className);
		if ($repoItem != null)
		{
			//found in repoItem
			//echo var_dump($repoItem);
			return $repoItem;
		}
		else
		{
			// look in db
			$itemAttributes = $this->tdg->getItemByModelNumber($modelNumber, $className);
			//echo var_dump($itemAttributes);
			if ($itemAttributes != null)
			{
				$item = $this->createItemInstance($itemAttributes, $className);

				if ($item != null)
				{
					session()->get('repo')->addItem($item);

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
			session()->get('repo')->updateItem($newItem, $modelNumber);
			$this->uow->registerDirty($newItem);
			$this->uow->commit();
		}
	}

	public function setItemBySerialNumber( $newItem, $modelNumber, $serialNumber )
	{
		if ($this->findItembySerialNumber( $modelNumber, $serialNumber ) != null )
		{
			session()->get('repo')->updateItemBySerialNumber( $newItem, $modelNumber, $serialNumber );
			$this->uow->registerDirty($newItem);
			$this->uow->commit();
		}
	}

	public function eraseItem($item)
	{
		if ($item != null)
		{
			session()->get('repo')->deleteItem($item);
			$this->uow->registerDeleted($item);
			$this->uow->commit();
		}
	}

	public function makeNewItem($itemAttributes, $className)
	{
    	$item = $this->createItemInstance($itemAttributes, $className);

		session()->get('repo')->addItem($item);
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
        session()->get('repo')->addItem($item);
      }

      return $objArray;
    }
    else
    {
      // Case where some are in the repo but not all
    }
  }

	public function addSerialToShoppingCartTable( $itemToAddToCartTable )
	{
		$uid = Auth::id();
		$modelNumber = $itemToAddToCartTable->getModelNumber();
		$serialNumber = $itemToAddToCartTable->getSerialNumber();
		$price;
		foreach( session()->get('sessionCart') as $item )
		{
			if ( $item->getModelNumber() == $modelNumber )
			{
				$price = $item->getPrice();
			}
		}
		$this->tdg->addSerialToCartTable( $uid, $modelNumber, $serialNumber,
	 																		$price );
	}

	public function checkCartTimingsBySN( $snStrings )
	{
		$currentTime = date('Y-m-d H:i:s');
		foreach( $snStrings as $sn )
		{
			$addedTime = $this->tdg->getTimeStampBySerialNumber( $sn );
			$to_time = strtotime($currentTime);
			$from_time = strtotime($addedTime);
			// If the diff between time added to cart and current is greater than X
			if ( ( round( abs( $to_time - $from_time ) / 60, 2) ) > 1 /*1 minute timeout */ )
			{
				$sessionSerials = Session::get( 'sessionSerials' );
				$modelNum;
				$i = 0;
				foreach( $sessionSerials as $snObject )
				{
					if ( $snObject->getSerialNumber() == $sn )
					{
						// Handle the sessionSerials
						$modelNum = $snObject->getModelNumber();
						unset( $sessionSerials[$i] );
						$updatedSessionSerials = array_values( $sessionSerials );
						session()->forget( 'sessionSerials' );
						session()->put( 'sessionSerials' , $updatedSessionSerials );
						// Now handle sessionCart
						$localCart = session()->get('sessionCart');
						unset( $localCart[$i] );
						$updatedLocalCart = array_values( $localCart );
						session()->forget('sessionCart');
						session()->put( 'sessionCart', $updatedLocalCart );
						// Now sync sessionCart with the one inside repo
						session()->get('repo')->getCart()->syncCart( session()->get('sessionCart'));
						// Now handle removal from shoppingCart table
						$this->tdg->deleteFromShoppingCartsTable( $sn );
						// Now change the entry to purchasable in serialNumbers Table
						$this->tdg->updatePurchasableField( $sn, true );
					}
					$i++;
				}
			}
		}
	}

	public function setPurchasable( $serial, $val ){
		$this->tdg->updatePurchasableField( $serial->getSerialNumber(), $val) ;
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
