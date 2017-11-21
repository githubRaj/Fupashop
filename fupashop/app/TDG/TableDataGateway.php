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

		return DB::table('serialNumbers')->where('modelNumber', $modelNumber)->where('serialNumber', $serialNumber)->first();
	}

	public function getSerialNumbersByModelNumber($modelNumber)
	{
		//$tableName = $this->getTableName($className);

		return DB::table('serialNumbers')->where('modelNumber', $modelNumber)->get();
	}

	public function getTimeStampBySerialNumber( $serialNumber )
	{
		$tableName = "shoppingCarts";
		$timestamp = DB::table($tableName)->where('serialNumber', $serialNumber)->value('created_at');
		return $timestamp;
	}

	public function deleteFromShoppingCartsTable( $serialNumber )
	{
		$tableName = "shoppingCarts";
		DB::table($tableName)->where('serialNumber', '=', $serialNumber )->delete();
	}

	public function updatePurchasableField( $serialNumber, $val )
	{
		$tableName = "serialNumbers";
		DB::table($tableName)->where('serialNumber', $serialNumber)
												 ->update([ 'purchasable' => $val ]);
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

	public function addTransaction( $uid, $modelNumber, $serialNumber, $price )
	{
		$tableName = "purchases";
		$created = date('Y-m-d H:i:s');
		DB::table($tableName)->insert([ 'userID' => $uid , 'modelNumber' => $modelNumber,
																		'serialNumber' => $serialNumber, 'price' => $price,
																		'created_at' => $created, 'updated_at' => $created]);
	}

	public function addSerialToCartTable( $uid, $modelNumber, $serialNumber,
																				$price  )
	{
		$tableName = "shoppingCarts";
		$created = date('Y-m-d H:i:s');
		DB::table($tableName)->insert([ 'userID' => $uid , 'modelNumber' => $modelNumber,
																		'serialNumber' => $serialNumber, 'price' => $price,
																		'created_at' => $created, 'updated_at' => $created]);
	}

	public function insertItem($item)
	{
		$tableName = $this->getTableName(get_class($item));
		DB::table($tableName)->insert($item->getAttributes());
	}

	public function updateItem($item)
	{
		if (is_array( $item ) )
		{
			$item = $item[0];
		}
		$class = get_class($item);

		$attrName;
		$attrValue;
		switch ($class) {
			case 'App\Items\SerialNumber':
				$attrName = 'serialNumber';
				$attrValue = $item->getSerialNumber();
				break;

			default:
				$attrName = 'modelNumber';
				$attrValue = $item->getModelNumber();
				break;
		}
		$tableName = $this->getTableName(get_class($item));
		DB::table($tableName)->where( $attrName, $attrValue )->update($item->getAttributes());
	}

	public function deleteItem($item)
	{
		$tableName = $this->getTableName(get_class($item));
		DB::table($tableName)->where('modelNumber', $item->getModelNumber())->delete();
	}
}
