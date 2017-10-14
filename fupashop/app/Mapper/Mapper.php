<?php

namespace App\Mapper;
use App\UOW\UOW;
use App\TDG\TableDataGateway;
use App\Repository;
use App\Items\Item;
use App\Items\Tablet;
use App\Items\Monitor;
use App\Items\Tv;
use App\Items\Desktop;
use App\Items\Laptop;

class Mapper
{
	//protected $tablets;
	protected $tdg;
	protected $uow;
	protected $repo;

	public function __construct()
	{
		$this->tdg = new TableDataGateway();
		$this->repo = new Repository();
		$this->uow = new UOW($this);

	}
/*-------------------TABLETS---------------------------*/

	// changed tablets to illustrate my understanding of the implementation
	public function getAllTablets()
	{

		
		//if($this->repo->emptyTablets()){	//no Tablets found in repo. load all from db to repo
			$tempTablets =  $this->tdg->getAllTablets();
			foreach($tempTablets as $item){
				//create the object
				$tablet = new Tablet($item->modelNumber, $item->processor, $item->screenSize, $item->dimensions, $item->ramSize, $item->weight, $item->cpucores, $item->hddSize, $item->batteryInformation, $item->brandName, $item->operatingSystem, $item->cameraInformation, $item->price);
				//store into repo
				$this->repo->addTabletToRepo($tablet);
			}
		//}
		//testing tablet object display

		//$test = array();
		//$test = $this->repo->getAllTablets();
		//var_dump($test);
		return $this->repo->getAllTablets();
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

			return new Tablet($tablet->modelNumber, $tablet->processor, $tablet->screenSize, $tablet->dimensions, $tablet->ramSize, $tablet->weight, $tablet->cpucores, $tablet->hddSize, $tablet->batteryInformation, $tablet->brandName, $tablet->operatingSystem, $tablet->cameraInformation, $tablet->price);
		}
		else //doesnt exist

			return  null;
//testing tablet object display

	}
/*-------------------DEKSTOPS---------------------------*/

	public function getAllDesktops(){

		if($this->repo->emptyDesktops()){	//no desktops found in repo. load all from db to repo
			$tempDesktop =  $this->tdg->getAllDesktops();
			foreach($tempDesktop as $item){
				//create the object
				$desktop = new Desktop($item->modelNumber, $item->processor, $item->dimensions, $item->ramSize, $item->weight, $item->cpuCores, $item->hddSize, $item->brandName, $item->price);
				//store into repo
				$this->repo->addDesktopToRepo($desktop);
			}
		}

		return $this->repo->getAllDesktops();
	}

	public function getDesktopById($id)
	{

		$tempItem = $this->repo->getSingleDesktop($id);
		if($tempItem != null){
			//found in repo
			return $tempItem;
		}
		else if($this->tdg->ifDesktopExists($id) > 0){
			//found in db
			$desktop = $this->tdg->getDesktopById($id);

			$item = $desktop;

			return new Desktop($item->modelNumber, $item->processor, $item->dimensions, $item->ramSize, $item->weight, $item->cpuCores, $item->hddSize, $item->brandName, $item->price);
		}
		else //doesnt exist
			return  null;

		
	}

/*-------------------MONITORS---------------------------*/

	public function getAllMonitors()
	{
		
		if($this->repo->emptyMonitors()){	//no Monitors found in repo. load all from db to repo
			$tempMonitors =  $this->tdg->getAllMonitors();
			foreach($tempMonitors as $item){
				//create the object
				$monitor = new Monitor($item->modelNumber, $item->size, $item->weight, $item->brandName, $item->price);
				//store into repo
				$this->repo->addMonitorToRepo($monitor);
			}
		}

		return $this->repo->getAllMonitors();
	}


	public function getMonitorById($id)
	{

		$tempItem = $this->repo->getSingleMonitor($id);
		if($tempItem != null){
			//found in repo
			return $tempItem;
		}
		else if($this->tdg->ifMonitorExists($id) > 0){
			//found in db
			$monitor = $this->tdg->getMonitorById($id);

			$item = $monitor;

			return new Monitor($item->modelNumber, $item->size, $item->weight, $item->brandName, $item->price);
		}
		else //doesnt exist
			return  null;

		
	}

/*-------------------TVS---------------------------*/

	public function getAllTvs()
	{
		
		if($this->repo->emptyTvs()){	//no Monitors found in repo. load all from db to repo
			$tempTvs =  $this->tdg->getAllTvs();
			foreach($tempTvs as $item){
				//create the object
				$tv = new Tv($item->brandName, $item->dimensions, $item->weight, $item->tvType, $item->modelNumber, $item->price, $item->resolution, $item->screenSize);
				//store into repo
				$this->repo->addTvsToRepo($tv);
			}
		}

		return $this->repo->getAllTvs();
	}


	public function getTvById($id)
	{

		$tempItem = $this->repo->getSingleTv($id);
		if($tempItem != null){
			//found in repo
			return $tempItem;
		}
		else if($this->tdg->ifTvExists($id) > 0){
			//found in db
			$tv = $this->tdg->getTvById($id);

			$item = $tv;

			return new Tv($item->modelNumber, $item->dimensions, $item->screenSize, $item->tvType, $item->resolution, $item->weight, $item->brandName, $item->price);
		}
		else //doesnt exist
			return  null;


	}
/*-------------------LAPTOPS---------------------------*/

	public function getLaptops(){

		return $this->tdg->laptopGateway();
	}


	public function getAllLaptops()
	{
		
		if($this->repo->emptyLaptops()){	//no Monitors found in repo. load all from db to repo
			$tempTvs =  $this->tdg->getAllLaptops();
			foreach($tempTvs as $item){
				//create the object
				$laptop = new Laptop($item->modelNumber, $item->processor, $item->displaySize, $item->ramSize, $item->weight, $item->cpuCores, $item->hddSize, $item->batteryType, $item->batteryInformation, $item->brandName, $item->operatingSystem, $item->touchFeature, $item->cameraInformation, $item->price);
				//store into repo
				$this->repo->addLaptopToRepo($laptop);
			}
		}

		return $this->repo->getAllLaptops();
	}


	public function getLaptopById($id)
	{

		$tempItem = $this->repo->getSingleLaptop($id);
		if($tempItem != null){
			//found in repo
			return $tempItem;
		}
		else if($this->tdg->ifLaptopExists($id) > 0){
			//found in db
			$laptop = $this->tdg->getLaptopById($id);

			$item = $laptop;

			return new Laptop($item->modelNumber, $item->processor, $item->displaySize, $item->ramSize, $item->weight, $item->cpuCores, $item->hddSize, $item->batteryType, $item->batteryInformation, $item->brandName, $item->operatingSystem, $item->touchFeature, $item->cameraInformation, $item->price);
		}
		else //doesnt exist
			return  null;

		
	}



/*-------------------FUNCTIONALITY---------------------------*/

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
