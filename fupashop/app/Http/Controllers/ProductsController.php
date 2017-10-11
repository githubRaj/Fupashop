<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tv;
use App\Desktop;
use App\Laptop;
use App\Monitor;
use App\Tablet;
//gotta check this
use Session;
use App\Cart;

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
        $brands = Desktop::all(['brandName'])->unique('brandName');



    	return view ('desktops.index', compact('desktops','brands'));
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
      $brands = Tablet::all(['brandName'])->unique('brandName');
    	return view ('tablets.index', compact('tablets', 'brands'));
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

    public function Create()
    {
      return view('Product/create');
    }

    public function store(Request $request)
    {
      $desktop = new Desktop;
      $desktop->modelNumber = $request->input('modelNumber');
      $desktop->processor = $request->input('processor');
      $desktop->dimensions = $request->input('dimensions');
      $desktop->ramSize = $request->input('ramSize');
      $desktop->weight = $request->input('weight');
      $desktop->cpuCores = $request->input('cpuCores');
      $desktop->hddSize = $request->input('hddSize');
      $desktop->brandName = $request->input('brandName');
      $desktop->price = $request->input('price');
      $desktop->save();
      return redirect('/adminpanel')->with('success', 'Product Added!');
    }

    // Add product to cart
    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        //test line
        dd($request->session()->get('cart'));
        return redirect()->route('product.index');
    }



}
