<?php

namespace App\Mapper;
use App\TDG\TableDataGateway;
class Mapper
{
	//protected $tablets;

	public function assignTablets(){

		
	}

	public function __construct(){
		
	}

	public function getTablets(){
		$tdg = new TableDataGateway();
		return $tdg->tabletGateway();
	}

	public function getDesktops(){
		$tdg = new TableDataGateway();
		return $tdg->desktopGateway();
	}
	public function getMonitors(){
		$tdg = new TableDataGateway();
		return $tdg->monitorGateway();
	}

	public function getTvs(){
		$tdg = new TableDataGateway();
		return $tdg->tvGateway();
	}

	public function getLaptops(){
		$tdg = new TableDataGateway();
		return $tdg->laptopGateway();
	}
}
