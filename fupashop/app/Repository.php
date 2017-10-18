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
		//echo var_dump($tempTablet->getProcessor());
		//return;
		$this->tablets[] = $tablet;
		return;
	}

	public function getSingleTablet($id){

		foreach($this->tablets as $item){
			if($item->getModelNumber() == $id)
				return $item;
		}
		return null;
	}

	public function emptyTablets(){
		return empty($this->tablets);
	}
/*-------------------DESKTOPS---------------------------*/
	public function getAllDesktops(){

		return $this->desktops;
	}

	public function updateDesktop($newDesktop, $oldModelNumber)
	{
		$oldDesktop = null;
		$oldDesktop = Repository::getSingleDesktop($oldModelNumber);
		$tempArray = array();
		$tempArray = $newDesktop->getAttributes();
		$oldDesktop->setAll($tempArray);
		//echo var_dump($oldDesktop);
		//return;
	}

	public function updateLaptop($newLaptop, $oldModelNumber)
	{
		$oldLaptop = Repository::getSingleLaptop($oldModelNumber);
		$tempArray = array();
		$tempArray = $newLaptop->getAttributes();
		$oldLaptop->setAll($tempArray);

	}

	public function updateMonitor($newMonitor, $oldModelNumber)
	{
		$oldMonitor = Repository::getSingleMonitor($oldModelNumber);
		$tempArray = array();
		$tempArray = $newMonitor->getAttributes();
		$oldMonitor->setAll($tempArray);
	}

	public function updateTablet($newTablet, $oldModelNumber)
	{
		$oldTablet = Repository::getSingleTablet($oldModelNumber);
		$tempArray = array();
		$tempArray = $newTablet->getAttributes();
		$oldTablet->setAll($tempArray);
	}

	public function updateTv($newTv, $oldModelNumber)
	{
		$oldTv = Repository::getSingleTv($oldModelNumber);
		$tempArray = array();
		$tempArray = $newTv->getAttributes();
		$oldTv->setAll($tempArray);
	}

	public function addDesktopToRepo($desktop){
		$this->desktops[] = $desktop;
	}

	public function getSingleDesktop($id){
		foreach($this->desktops as $item){
			if($item->getModelNumber() == $id)
				return $item;
		}
	}

	public function emptyDesktops(){
		return empty($this->desktops);
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
			if($item->getModelNumber() == $id)
				return $item;
		}
	}

	public function emptyMonitors(){
		return empty($this->monitors);
	}
/*-------------------TVS---------------------------*/
	public function getAllTvs(){

		return $this->tvs;
	}

	public function addTvsToRepo($tv){
		$this->tvs[] = $tv;
	}
	public function getSingleTv($id){

		foreach($this->tvs as $item){
			if($item->getModelNumber() == $id)
				return $item;
		}
	}

	public function emptyTvs(){
		return empty($this->tvs);
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
			if($item->getModelNumber() == $id)
				return $item;
		}
	}

	public function emptyLaptops(){
		return empty($this->laptops);
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
			if($item->getModelNumber() == $id)
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
		    if($object[$key]->getModelNumber() == $id) {

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
