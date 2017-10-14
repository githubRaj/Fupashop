<?php

// Notes/TODO: 	- $type should be strongly typed and not a string, i.e, using an enum (custom class in PHP) or maybe use get_class()
//				- Make everyone like Tablet

namespace App;
use App\Items\Tv;
use App\Items\Desktop;
use App\Items\Laptop;
use App\Items\Monitor;
use App\Items\Tablet;

class Repository
{
	//protected $tablets;
	private $tablets;
    private $desktops;
    private $tvs;
    private $monitors;
    private $laptops;

	public function __construct(){

		$this->tablets = array(); 
        $this->desktops = array();
        $this->tvs = array();
        $this->monitors = array();
        $this->laptops = array();
	
	}
/*-------------------TABLETS---------------------------*/
	public function getAllTablets(){
		
		return $this->tablets;
	}

	public function addTabletToRepo($tablet){
		//if (!itemExists($tablet))
			$tablet->setItemType('Tablet');
			$this->tablets[] = $tablet;
	}

	public function getSingleTablet($id){
		
		foreach($this->tablets as $item){
			if($item->getModelNumber() == $id)
				return $item;
		}
		return null;
	}
/*-------------------DESKTOPS---------------------------*/
	public function getAllDesktops(){
		
		return $this->desktops;
	}

	public function addDesktopToRepo($desktop){
		$this->desktops[] = $desktop;
	}

	public function getSingleDesktop($id){
		
		foreach($this->desktops as $item){
			if($item->modelNumber == $id)
				return $item;
		}
	}
/*-------------------MONITORS---------------------------*/
	public function getAllMonitors(){
		
		return $this->monitors;
	}

	public function addMonitorToRepo($monitor){
		$this->monitors[] = $monitor;
	}

	public function getSingleMonitor($id){
		
		foreach($this->monitors as $item){
			if($item->modelNumber == $id)
				return $item;
		}
	}
/*-------------------TVS---------------------------*/
	public function getAllTvs(){
		
		return $this->tvs;
	}

	public function addTvToRepo($tv){
		$this->tvs[] = $tv;
	}
	public function getSingleTv($id){
		
		foreach($this->tvs as $item){
			if($item->modelNumber == $id)
				return $item;
		}
	}
/*-------------------LAPTOPS---------------------------*/
	public function getAllLaptops(){
		
		return $this->laptops;
	}

	public function addLaptopToRepo($laptop){
		$this->laptops[] = $laptop;
	}
	public function getSingleLaptop($id){
		
		foreach($this->laptops as $item){
			if($item->modelNumber == $id)
				return $item;
		}
	}

/*-------------------GENERAL FUNCTIONALITY---------------------------*/

	public function isEmpty($type){
		switch ($type) {
			case 'tablets':
				$object = $this->tablets;
				break;
			case 'desktops':
				$object = $this->desktops;
				break;
			case 'tvs':
				$object = $this->tvs;
				break;
			case 'laptops':
				$object = $this->laptops;
				break;
			case 'monitors':
				$object = $this->monitors;
				break;
			default:
				$object = array();
				break;
		}

		return empty($object);
	}



	public function itemExists($type, $id){
		//$type = object to search in i.e tablets, desktops, monitors, etc..
		//$id = model number of item (unique key)

		switch ($type) {
			case 'tablets':
				$object = $this->tablets;
				break;
			case 'desktops':
				$object = $this->desktops;
				break;
			case 'tvs':
				$object = $this->tvs;
				break;
			case 'laptops':
				$object = $this->laptops;
				break;
			case 'monitors':
				$object = $this->monitors;
				break;
			default:
				$object = array();
				break;
		}

		foreach($object as $item){
			if($item->modelNumber == $id)
				return true;
		}
		return false;
	}

		public function removeFromRepo($type, $id){
		switch ($type) {
			case 'tablets':

				$object = $this->tablets;
				break;
			case 'desktops':
				$object = $this->desktops;
				break;
			case 'tvs':
				$object = $this->tvs;
				break;
			case 'laptops':
				$object = $this->laptops;
				break;
			case 'monitors':
				$object = $this->monitors;
				break;
			default:
				$object = array();
				break;
		}

		/*if(($key = array_search($id, $object)) !== false) {
    		unset($object[$key]);
		}*/
		foreach ($object as $key => $item) {
		    if($object[$key]->modelNumber == $id) {

		        unset($object[$key]);
		    }
		}
		switch ($type) {
			case 'tablets':
				$this->tablets = $object;
				break;
			case 'desktops':
				$this->desktops = $object;
				break;
			case 'tvs':
				$this->tvs = $object;
				break;
			case 'laptops':
				$this->laptops = $object;
				break;
			case 'monitors':
				$this->monitors = $object;
				break;
		}
	}

}
