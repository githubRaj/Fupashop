<?php

namespace App\Mapper;
use App\UOW\UOW;
use App\TDG\TableDataGateway;
use App\Repository;
use App\Items\Item;
use App\Items\Tablet;

class Mapper
{
	//protected $tablets;
	private $tdg;
	private $uow;
	private $repo;

	public function __construct()
	{
		$this->tdg = new TableDataGateway();
		$this->uow = new UOW($this);
	}

	// changed tablets to illustrate my understanding of the implementation
	public function getTablets()
	{

		return $this->tdg->getAllTablets();

		//$tablet = new Tablet($item->modelNumber, $item->brandName, $item->price, $item->weight, $item->displaySize, $item->dimensions, $item->screenSize, $item->ramSize, $item->cpucores, $item->hddSize, $item->batteryInformation, $item->operatingSystem, $item->cameraInformation);

		//return $tablet;


	}

	public function getTabletById($id)
	{

		$tempItem = $this->repo->getSingleTablet($id);
		if($tempItem != null){
			//found in repo
			return $tempItem;
		}
		else if($this->tdg->ifTabletExists($id) > 0){
			//found in db
			$item = $this->tdg->getTabletById($id);

			$tablet = $item;

			return new Tablet($tablet->modelNumber, $tablet->processor, $tablet->screensize, $tablet->dimensions, $tablet->ramSize, $tablet->weight, $tablet->cpucores, $tablet->hddSize, $tablet->batteryInformation, $tablet->brandName, $tablet->operatingSystem, $tablet->cameraInformation, $tablet->price);
		}
		else //doesnt exist
			return  is_null;


	}

	public function getDesktops(){

		return $this->tdg->desktopGateway();
	}
	public function getMonitors(){

		return $this->tdg->monitorGateway();
	}

	public function getTvs(){

		return $this->tdg->tvGateway();
	}

	public function getLaptops(){

		return $this->tdg->laptopGateway();
	}

	public function saveNewItem($item)
	{
		// try this
		switch (get_class($item))
		{
			case 'Tablet':
				$this->tdg->insertTablet($item);
				break;
			case 'Desktop':
				$this->tdg->insertDesktop($item);
				break;
			case 'Monitor':
				$this->tdg->insertMonitor($item);
				break;
			case 'Tv':
				$this->tdg->insertTv($item);
				break;
			case 'Laptop':
				$this->tdg->insertLaptop($item);
				break;
			default:
				echo 'UNABLE TO CAPTURE PRODUCT TYPE';
		}
	}

	public function saveDirtyItem($item)
	{
		// try this
		switch (get_class($item))
		{
			case 'Tablet':
				$this->tdg->updateTablet($item);
				break;
			case 'Desktop':
				$this->tdg->updateDesktop($item);
				break;
			case 'Monitor':
				$this->tdg->updateMonitor($item);
				break;
			case 'Tv':
				$this->tdg->updateTv($item);
				break;
			case 'Laptop':
				$this->tdg->updateLaptop($item);
				break;
			default:
				echo 'UNABLE TO CAPTURE PRODUCT TYPE';
		}
	}

	public function saveDeletedItem($item)
	{
		switch (get_class($item))
		{
			case Tablet::class:
				$this->tdg->deleteTablet($item);
				break;
			case Desktop::class:
				$this->tdg->deleteDesktop($item);
				break;
			case Monitor::class:
				$this->tdg->deleteMonitor($item);
				break;
			case Tv::class:
				$this->tdg->deleteTv($item);
				break;
			case Laptop::class:
				$this->tdg->deleteLaptop($item);
				break;
			default:
				echo 'UNABLE TO CAPTURE PRODUCT TYPE';
		}
	}
}
