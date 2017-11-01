<?php

namespace App\TDG;
use Illuminate\Support\Facades\DB;
//use App\Item;


class TableDataGateway
{
	public function getTableName($className)
	{
		switch($className)
		{
			case 'App\Items\Tablet':
				return 'tablets';
				break;
			case 'App\Items\Desktop':
				return 'desktops';
				break;
			case 'App\Items\Monitor':
				return 'monitors';
				break;
			case'App\Items\Laptop':
				return 'laptops';
				break;
			case 'App\Items\SerialNumber':
				return 'serialnumbers';
				break;
		}

		return null;
	}

	public function getItemBySerialNumber($modelNumber, $serialNumber)
	{

		return DB::table('serialnumbers')->where('modelNumber', $modelNumber)->where('serialNumber', $serialNumber)->first();
	}

	public function getSerialNumbersByModelNumber($modelNumber)
	{
		//$tableName = $this->getTableName($className);

		return DB::table('serialnumbers')->where('modelNumber', $modelNumber)->get();
	}


	public function getItemByModelNumber($modelNumber, $className)
	{
		$tableName = $this->getTableName($className);

		return DB::table($tableName)->where('modelNumber', $modelNumber)->first();
	}

	public function getAllItemsByClass($className)
	{
		$tableName = $this->getTableName($className);
		return DB::table($tableName)->get();
	}

	public function insertItem($item)
	{	$item = $item[0];
		$tableName = $this->getTableName(get_class($item));
		DB::table($tableName)->insert($item->getAttributes());
	}

	public function updateItem($item)
	{
		$item = $item[0];
		$tableName = $this->getTableName(get_class($item));
		DB::table($tableName)->where('modelNumber', $item->getModelNumber())->update($item->getAttributes());
	}

	public function deleteItem($item)
	{
		$item = $item[0];
		$tableName = $this->getTableName(get_class($item));
		DB::table($tableName)->where('modelNumber', $item->getModelNumber())->delete();
	}
}
