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
    public function Tvindex()
    {
    	$tvs = Tv::all();

    	return view ('tvs.index', compact('tvs'));
    }

     public function Desktopindex()
    {
    	$desktops = Desktop::all();

    	return view ('desktops.index', compact('desktops'));
    }

     public function Laptopindex()
    {
    	$laptops = Laptop::all();

    	return view ('laptops.index', compact('laptops'));
    }

    public function Monitorindex()
    {
    	$monitors = Monitor::all();

    	return view ('monitors.index', compact('monitors'));
    }
    public function Tabletindex()
    {
    	$tablets = Tablet::all();

    	return view ('tablets.index', compact('tablets'));
    }

    public function test()
    {
        $results = Tablet::all();

        return view ('test', compact('results'));
    }
}
