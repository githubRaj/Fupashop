<?php

namespace App\TDG;
use Illuminate\Support\Facades\DB;
//use App\Item;


class TableDataGateway
{
	// Tablets -- All these methods can be made generic, since the table name is the only thing that is explicitly referenced
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

	// TODO : Return confirmation to mapper

	// Desktops etc

	public function desktopGateway(){
		return DB::table('desktops')->get();
	}

	public function monitorGateway(){
		return DB::table('monitors')->get();
	}

	public function tvGateway(){
		return DB::table('tvs')->get();
	}

	public function laptopGateway(){
		return DB::table('laptops')->get();
	}
}
