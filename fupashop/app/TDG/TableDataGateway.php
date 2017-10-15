<?php

namespace App\TDG;
use Illuminate\Support\Facades\DB;
//use App\Item;


class TableDataGateway
{
	// Tablets -- All these methods can be made generic, since the table name is the only thing that is explicitly referenced
	/*-------------------TABLETS---------------------------*/
	public function tabletGateway()
	{
		return DB::table('tablets');
	}

	public function getAllTablets()
	{
		return DB::table('tablets')->get();
	}

	public function getTabletById($modelNumber)
	{
		return DB::table('tablets')->where('modelNumber', $modelNumber)->first();
	}

	public function ifTabletExists($modelNumber)
	{
		return DB::table('tablets')->where('modelNumber', $modelNumber)->count();
	}

	public function insertTablet($tablet)
	{
		DB::table('tablets')->insert($tablet->getAttributes());
	}

	public function updateTablet($tablet)
	{
		DB::table('tablets')->where('modelNumber', $tablet->modelNumber)->update($tablet->getAttributes());
	}

	public function deleteTablet($tablet)
	{
		DB::table('tablets')->where('modelNumber', $tablet->getModelNumber())->delete();
	}
/*-------------------DESKTOPS---------------------------*/
	// TODO : Return confirmation to mapper

	// Desktops etc

	public function desktopGateway()
	{
		return DB::table('desktops');
	}

	public function getAllDesktops()
	{
		return DB::table('desktops')->get();
	}

	public function getDesktopById($modelNumber)
	{
		return DB::table('desktops')->where('modelNumber', $modelNumber)->first();
	}

	public function ifDesktopExists($modelNumber)
	{
		return DB::table('desktops')->where('modelNumber', $modelNumber)->count();
	}

	public function insertDesktop($desktop)
	{
		echo "Hi mom";
		return;
		DB::table('desktops')->insert($desktop->getAttributes());
	}

	public function updateDesktop($desktop)
	{
		DB::table('desktops')->where('modelNumber', $desktop->modelNumber)->update($desktop->getAttributes());
	}

	public function deleteDesktop($desktop)
	{
		DB::table('desktops')->where('modelNumber', $desktop->getModelNumber())->delete();
	}
/*-------------------MONITORS---------------------------*/
	public function monitorGateway()
	{
		return DB::table('monitors');
	}

	public function getAllMonitors()
	{
		return DB::table('monitors')->get();
	}

	public function getMonitorById($modelNumber)
	{
		return DB::table('monitors')->where('modelNumber', $modelNumber)->first();
	}

	public function ifMonitorExists($modelNumber)
	{
		return DB::table('monitors')->where('modelNumber', $modelNumber)->count();
	}

	public function insertMonitor($monitor)
	{
		DB::table('monitors')->insert($monitor->getAttributes());
	}

	public function updateMonitor($monitor)
	{
		DB::table('monitors')->where('modelNumber', $monitor->modelNumber)->update($monitor->getAttributes());
	}

	public function deleteMonitor($monitor)
	{
		DB::table('monitors')->where('modelNumber', $monitor->getModelNumber())->delete();
	}
/*-------------------TVS---------------------------*/
	public function tvGateway()
	{
		return DB::table('tvs');
	}

	public function getAllTvs()
	{
		return DB::table('tvs')->get();
	}

	public function getTvById($modelNumber)
	{
		return DB::table('tvs')->where('modelNumber', $modelNumber)->first();
	}

	public function ifTvExists($modelNumber)
	{
		return DB::table('tvs')->where('modelNumber', $modelNumber)->count();
	}

	public function insertTv($tv)
	{
		DB::table('tvs')->insert($tv->getAttributes());
	}

	public function updateTv($tv)
	{
		DB::table('tvs')->where('modelNumber', $tv->modelNumber)->update($tv->getAttributes());
	}

	public function deleteTv($tv)
	{
		DB::table('tvs')->where('modelNumber', $tv->getModelNumber())->delete();
	}
/*-------------------LAPTOPS---------------------------*/
	public function laptopGateway()
	{
		return DB::table('laptops');
	}

	public function getAllLaptops()
	{
		return DB::table('laptops')->get();
	}

	public function getLaptopById($modelNumber)
	{
		return DB::table('laptops')->where('modelNumber', $modelNumber)->first();
	}

	public function ifLaptopExists($modelNumber)
	{
		return DB::table('laptops')->where('modelNumber', $modelNumber)->count();
	}

	public function insertLaptop($laptop)
	{
		DB::table('laptops')->insert($laptop->getAttributes());
	}

	public function updateLaptop($laptop)
	{
		DB::table('laptops')->where('modelNumber', $laptop->modelNumber)->update($laptop->getAttributes());
	}

	public function deleteLaptop($laptop)
	{
		DB::table('laptops')->where('modelNumber', $laptop->getModelNumber())->delete();
	}
}
