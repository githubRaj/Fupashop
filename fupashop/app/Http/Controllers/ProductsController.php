<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tv;
use App\Desktop;
use App\Laptop;
use App\Monitor;
use App\Tablet;

class ProductsController extends Controller
{

    /*--------------------------------
          TVS        */
    public function Tvindex()
    {
    	$tvs = Tv::all();

    	return view ('tvs.index', compact('tvs'));
    }
    public function getTv($id)
    {
        $tv = Tv::where('modelNumber',  $id)->get();
        return view ('tvs.info', compact('tv'));
    }
    /*--------------------------------
          DESKTOPS        */

     public function Desktopindex()
    {
    	$desktops = Desktop::all();

    	return view ('desktops.index', compact('desktops'));
    }
    public function getDesktop($id)
    {
        $desktop = Desktop::where('modelNumber',  $id)->get();
        return view ('desktops.info', compact('desktop'));
    }

    /*--------------------------------
          LAPTOPS        */

     public function Laptopindex()
    {
    	$laptops = Laptop::all();

    	return view ('laptops.index', compact('laptops'));
    }
    public function getLaptop($id)
    {
        $laptop = Laptop::where('modelNumber',  $id)->get();
        return view ('laptops.info', compact('laptop'));
    }

    /*--------------------------------
          MONITORS        */

    public function Monitorindex()
    {
    	$monitors = Monitor::all();

    	return view ('monitors.index', compact('monitors'));
    }
    public function getMonitor($id)
    {
        $monitor = Monitor::where('modelNumber',  $id)->get();
        return view ('monitors.info', compact('monitor'));
    }
    /*--------------------------------
              TABLETS        
    */

    public function Tabletindex()
    {
    	$tablets = Tablet::all();

    	return view ('tablets.index', compact('tablets'));
    }
    public function getTablet($id)
    {
        $tablet = Tablet::where('modelNumber',  $id)->get();
        return view ('tablets.info', compact('tablet'));
    }

    /*--------------------------------
          TESTING        */

    public function test()
    {
        $results = Tablet::all();

        return view ('test', compact('results'));
    }
}
