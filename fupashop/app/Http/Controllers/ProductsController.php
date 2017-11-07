<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items\Desktop;
use App\Items\Laptop;
use App\Items\Monitor;
use App\Items\Tablet;
use App\Mapper\Mapper;
use App\Items\SerialNumber;
//gotta check this
use Session;
use App\Cart;

class ProductsController extends Controller
{
    private $mapper;

    public function __construct()
    {
      $this->middleware('auth');
      $this->mapper = new Mapper();
    }

    public function getViewDirName($className)
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
       // case 'App\Items\SerialNumber':
      //    return 'serialnumbers';
          break;
      }

      return null;
    }

     public function getSerialNumberItem($modelNumber,$serialNumber, $className)
    {
      // Get item from storage
      $item = $this->mapper->findItembySerialNumber($modelNumber, $serialNumber, $className);
      // If item exists, go to item page, else go to item not found page
      if ($item != null)
      {
        $dirName = $this->getViewDirName($className);
        return view ($dirName . '.info', compact('item'));
      }
      else
      {
        echo 'itemNotFoundError';
        return;
          // return view (error.itemNotFound, compact('modelNumber'));
      }
    }

    public function getItem($modelNumber, $className)
    {
      // Get item from storage

      $this->mapper->getStockByModelNumber($modelNumber, $className);
      $item = $this->mapper->findItemByModelNumber($modelNumber, $className);                                                       //<---- new repo by Jeff forces Items pulled into an array. must use index 0
      //$this->getSerialNumberItem($modelNumber,'VtL3atvfYZ', $className);          // <---- test to see if you can pull serial number
      // If item exists, go to item page, else go to item not found page
      if ($item != null)
      {
        $dirName = $this->getViewDirName($className);
        return view ($dirName . '.info', compact('item'));
      }
      else
      {
        echo 'itemNotFoundError';
        return;
          // return view (error.itemNotFound, compact('modelNumber'));
      }
    }

    // Generic index page fetcher. $filters a subset of getAttributes() to be filterable on products page
    public function getIndex($className, $filters)
    {
      // Create new array
      $filterArray = array();

      // Make array 2D and set key names to filters
      foreach ($filters as $filter)
        $filterArray[$filter] = array();

      // Fetch all items of a given class
      $items =  $this->mapper->findAllItemsByClass($className);
      
      // Populate the 2D array of filter values
      foreach ($items as $item)
      {
        $itemAttributes = $item->getAttributes();
        
        
        $this->mapper->initializeItemStock($item, $className);
        if($this->mapper->findItemByModelNumber($item->getModelNumber(), $className)->getStock() == 0){

          session()->put('itemToLock.'.$item->getModelNumber(),true);
        }
        elseif(session()->exists('itemToLock.'.$item->getModelNumber()))
        {
          session()->forget('itemToLock.'.$item->getModelNumber());  
        }

        foreach ($filters as $filter)
          array_push($filterArray[$filter], $itemAttributes[$filter]);
      }

      // Make array of filter values unique (remove duplicates)
      foreach ($filters as $filter)
        $filterArray[$filter] = array_unique($filterArray[$filter]);

      // Get view wrt class name and pass the item objects and array of filters to it
      $dirName = $this->getViewDirName($className);
      return view ($dirName . '.index', compact('items','filterArray'));
    }

    /*--------------------------------
          PRODUCT PAGES        */

    public function getDesktop($modelNumber)
    {
      return $this->getItem($modelNumber, Desktop::class);
    }

    public function getLaptop($modelNumber)
    {
      return $this->getItem($modelNumber, Laptop::class);
    }

    public function getMonitor($modelNumber)
    {
      return $this->getItem($modelNumber, Monitor::class);
    }

    public function getTablet($modelNumber)
    {
      return $this->getItem($modelNumber, Tablet::class);
    }

    /*--------------------------------
          CATEGORY PAGES        */

    public function Desktopindex()
    {
      $filters = array();
      array_push($filters, 'brandName');
      array_push($filters, 'processor');

      return $this->getIndex(Desktop::class, $filters);
    }

     public function Laptopindex()
    {
      $filters = array();
      array_push($filters, 'brandName');
      array_push($filters, 'processor');

      return $this->getIndex(Laptop::class, $filters);
    }

    public function Monitorindex()
    {
    	$filters = array();
      array_push($filters, 'brandName');

      return $this->getIndex(Monitor::class, $filters);
    }

    public function Tabletindex()
    {
      $filters = array();
      array_push($filters, 'brandName');
      array_push($filters, 'processor');

      return $this->getIndex(Tablet::class, $filters);
    }

    /*--------------------------------
          TESTING        */

    public function getShowcaseArrays()
    {
      $desktops = $this->mapper->findAllItemsByClass(Desktop::class);
      $laptops = $this->mapper->findAllItemsByClass(Laptop::class);
      $monitors = $this->mapper->findAllItemsByClass(Monitor::class);
      $tablets = $this->mapper->findAllItemsByClass(Tablet::class);

      return view('home', compact('tablets', 'monitors', 'desktops', 'laptops'));
    }

    public function test()
    {
        $results = Tablet::all();

        return view ('test', compact('results'));
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
