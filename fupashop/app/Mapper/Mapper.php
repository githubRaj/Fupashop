<?php

namespace App\Mapper;
use App\TDG\TableDataGateway;

class Mapper
{
	//protected $tablets;
	private $tdg;

	public function __construct()
	{
		$this->tdg = new TableDataGateway();
	}

	// changed tablets to illustrate my understanding of the implementation
	public function getTablets()
	{
		return $this->tdg->getAllTablets();
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
		// try this
		switch (get_class($item))
		{
			case 'Tablet':
				$this->tdg->deleteTablet($item);
				break;
			case 'Desktop':
				$this->tdg->deleteDesktop($item);
				break;
			case 'Monitor':
				$this->tdg->deleteMonitor($item);
				break;
			case 'Tv':
				$this->tdg->deleteTv($item);
				break;
			case 'Laptop':
				$this->tdg->deleteLaptop($item);
				break;
			default:
				echo 'UNABLE TO CAPTURE PRODUCT TYPE';
		}
	}
}
