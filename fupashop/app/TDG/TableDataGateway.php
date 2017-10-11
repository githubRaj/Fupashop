<?php

namespace App\TDG;
use Illuminate\Support\Facades\DB;
//use App\Item;



class TableDataGateway
{
	public function tabletGateway(){
		return DB::table('tablets')->get();
	}

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
