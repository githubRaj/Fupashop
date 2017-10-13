<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items\Tv;
use App\Items\Desktop;
use App\Items\Laptop;
use App\Items\Monitor;
use App\Items\Tablet;
use App\Mapper\Mapper;
use App\Repository;
use App\UOW\UOW;
//gotta check this
 use Session;
 use App\Cart;

class ProductsController extends Controller
{
    private $mapper;

    //all items will be within Identity Map. This is temporary
    private $tablets;
    private $desktops;
    private $tvs;
    private $monitors;
    private $laptops;
    private $repo;
    private $uow;

    public function __construct()
    {
        $this->middleware('auth');
        $this->mapper = new Mapper();

        //all items will be within Identity Map. This is temporary
        //$this->tablets = new Tablet();
        /*
        $this->desktop = new Desktop();
        $this->tvs = new Tv();
        $this->monitors = new Monitor();
        $this->laptops = new Laptop();*/
        $this->repo = new Repository(); // <----- Identity Map
        $this->uow = new UOW($this->mapper); // Unit of Work
    }


    /*--------------------------------
          TVS        */
    public function Tvindex()
    {

      $this->tvs =  $this->mapper->getTvs();
      $tvs = $this->tvs; // cant send using compact without this
      return view ('tvs.index', compact('tvs'));
    }
    public function getTv($id)
    {
        $this->tvs =  $this->mapper->getTvs();
        foreach($this->tvs as $item){
          if($item->modelNumber == $id)
          {
            $tv = $item;
            return view ('tvs.info', compact('tv'));

          }
        }
    }
    /*--------------------------------
          DESKTOPS        */

     public function Desktopindex()
    {
    	//$desktops = Desktop::all();
      //$brands = Desktop::all(['brandName'])->unique('brandName');



    	//return view ('desktops.index', compact('desktops','brands'));

      $this->desktops =  $this->mapper->getDesktops();
      $desktops = $this->desktops; // cant send using compact without this

      $brands = array();
      foreach($desktops as $item){
        $flag = false;
        foreach($brands as $brand){
          if($brand == $item->brandName)
            $flag = true;
        }
        if($flag != true){
          $brands[] = $item->brandName;
        }
      }

      return view ('desktops.index', compact('desktops','brands'));


    }
    public function getDesktop($id)
    {
        $this->desktops =  $this->mapper->getDesktops();
        foreach($this->desktops as $item){
          if($item->modelNumber == $id)
          {
            $desktop = $item;
            return view ('desktops.info', compact('desktop'));

          }
        }
    }

    /*--------------------------------
          LAPTOPS        */

     public function Laptopindex()
    {

      $this->laptops =  $this->mapper->getLaptops();
      $laptops = $this->laptops; // cant send using compact without this

      $brands = array();
      foreach( $laptops as $item ){
        $flag = false;
        foreach( $brands as $brand ){
           if($brand == $item->brandName)
              $flag = true;
        }
        if( $flag != true ){
          $brands[] = $item->brandName;
        }
      }

      return view ('laptops.index', compact('laptops', 'brands'));
    }

    public function getLaptop($id)
    {


      $this->laptops =  $this->mapper->getLaptops();
        foreach($this->laptops as $item){
          if($item->modelNumber == $id)
          {
            $laptop = $item;
            return view ('laptops.info', compact('laptop'));

          }
        }
    }

    /*--------------------------------
          MONITORS        */

    public function Monitorindex()
    {
    	$this->monitors =  $this->mapper->getMonitors();
      $monitors = $this->monitors; // cant send using compact without this

      $brands = array();
      foreach( $monitors as $item ){
        $flag = false;
        foreach( $brands as $brand ){
          if($brand == $item->brandName){
            $flag = true;
          }
        } 
        if( $flag != true ){
          $brands[] = $item->brandName;
        }
      }
      return view ('monitors.index', compact('monitors', 'brands'));
    }
    public function getMonitor($id)
    {
      $this->monitors =  $this->mapper->getMonitors();
        foreach($this->monitors as $item){
          if($item->modelNumber == $id)
          {
            $monitor = $item;
            return view ('monitors.info', compact('monitor'));

          }
        }
    }
    /*--------------------------------
              TABLETS
    */

    public function Tabletindex()
    {
      $this->tablets =  $this->mapper->getTablets();
      $tablets = $this->tablets; // cant send using compact without this

      $brands = array();
      foreach( $tablets as $item ){
        $flag = false;
        foreach( $brands as $brand ){
          if($brand == $item->brandName)
              $flag = true;
        }
        if( $flag != true ){
          $brands[] = $item->brandName;
        }
      }

      return view ('tablets.index', compact('tablets', 'brands'));
    }

    public function getTablet($id)
    {
        /*$this->tablets =  $this->mapper->getTablets();
        foreach($this->tablets as $item){
          if($item->modelNumber == $id)
          {
            $tablet = $item;
            return view ('tablets.info', compact('tablet'));

          }
        }*/
        $tablets =  $this->mapper->getTablets();
        return;
        foreach($tablets as $item){
          echo $item->getModelNumber();
          return;
          if($item->getModelNumber() == $id)
          {
            $tablet = $item;
            $this->repo->addTabletToRepo($tablet);

          }
        }
        
        $tablet = $this->repo->getSingleTablets($id);
        //return $tablet;
        $this->uow->registerDeleted($tablet);
         $this->repo->removeFromRepo('tablets', $id);

      

      $this->uow->commit();
    }

    public function makeNewTablet($modelNumber, $brandName, $price, $weight, $displaySize, $dimensions, $screenSize, $ramSize, $cpucores, $hddSize, $batteryInformation, $operatingSystem, $cameraInformation)
    {
      $tablet = new Tablet($modelNumber, $brandName, $price, $weight, $displaySize, $dimensions, $screenSize, $ramSize, $cpucores, $hddSize, $batteryInformation, $operatingSystem, $cameraInformation);
    
      $this->repo->addTabletToRepo($tablet);

      $this->uow->registerNew($tablet);

      $this->uow->commit();
    }

    public function setTablet($modelNumber, $brandName, $price, $weight, $displaySize, $dimensions, $screenSize, $ramSize, $cpucores, $hddSize, $batteryInformation, $operatingSystem, $cameraInformation)
    {
      $tablet = new Tablet($modelNumber, $brandName, $price, $weight, $displaySize, $dimensions, $screenSize, $ramSize, $cpucores, $hddSize, $batteryInformation, $operatingSystem, $cameraInformation);
    
      // $type should either be generic of strongly typed
      $this->repo->removeFromRepo('tablet', $modelNumber);
      $this->repo->addTabletToRepo($tablet);

      $this->uow->registerDirty($tablet);

      $this->uow->commit();
    }

    public function deleteTablet($modelNumber)
    {
      // $type should either be generic of strongly typed
      $this->repo->removeFromRepo('tablet', $modelNumber);

      $this->uow->registerDeleted($tablet);

      $this->uow->commit();
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
      $desktop->save(); // should be passed to $mapper->saveNewItem($desktop)
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
