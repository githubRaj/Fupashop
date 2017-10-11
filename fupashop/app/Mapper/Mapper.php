<?php

namespace App\Mapper;
use App\TDG\TableDataGateway;
class Mapper
{
	//protected $tablets;
	private $tdg;

	public function __construct(){
		$this->tdg = new TableDataGateway();	
	}

	public function getTablets(){
		
		return $this->tdg->tabletGateway();
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
}
