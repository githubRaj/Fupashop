<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items\Tv;
use App\Items\Desktop;
use App\Items\Laptop;
use App\Items\Monitor;
use App\Items\Tablet;
use App\Mapper\Mapper;
use Session;


class AdminController extends Controller
{
  private $repo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->mapper = new Mapper();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }

    public function createDesktop()
    {
      return view('admin/adminpanelviews/adminAddDesktop');
    }

    public function storeDesktop(Request $request)
    {
          $desktop = new Desktop($request->input('modelNumber'), $request->input('processor'),
          $request->input('dimensions'), $request->input('ramSize'),$request->input('weight'),
          $request->input('cpuCores'), $request->input('hddSize'), $request->input('brandName'),
          $request->input('price')
          );
          $this->mapper->addDesktopToRepo($desktop);
          return redirect('/adminpanel/addNewDesktop');
    }

    public function showAdminDesktops()
   {
     $this->desktops =  $this->mapper->getAllDesktops();
     $desktops = $this->desktops;

     foreach($desktops as $item){
       $flag = false;
     }
     return view ('admin/adminpanelviews/adminDesktops', compact('desktops'));
   }


   public function createLaptop()
   {
     return view('admin/adminpanelviews/adminAddLaptop');
   }


  public function showAdminLaptops()
  {
    $this->laptops =  $this->mapper->getAllLaptops();
    $laptops = $this->laptops;


    foreach($laptops as $item){
      $flag = false;
    }
    return view ('admin/adminpanelviews/adminLaptops', compact('laptops'));
  }

  public function storeLaptop(Request $request)
  {
    $laptop = new Laptop($request->input('modelNumber'),$request->input('processor'),$request->input('displaySize'),$request->input('ramSize'),
              $request->input('weight'),$request->input('cpuCores'),$request->input('hddSize'),$request->input('batteryType'),
              $request->input('batteryInformation'),$request->input('brandName'),$request->input('operatingSystem'),$request->input('touchFeature'),
              $request->input('cameraInformation'),$request->input('price'));
    $this->mapper->addLaptopToRepo($laptop);
    return redirect('/adminpanel/addNewLaptop');
  }



  public function createTv()
  {
      return view('admin/adminpanelviews/adminAddTv');
  }


  public function showAdminTvs()
  {
    $this->tvs =  $this->mapper->getAllTvs();
    $tvs = $this->tvs; // cant send using compact without this

    foreach($tvs as $item){
      $flag = false;
    }
       return view ('admin/adminpanelviews/adminTvs', compact('tvs'));
   }

  public function storeTv(Request $request)
  {
     $tv = new Tv($request->input('modelNumber'), $request->input('dimensions'), $request->input('screenSize'), $request->input('tvType'),
     $request->input('resolution'), $request->input('weight'), $request->input('brandName'), $request->input('price'));

     $this->mapper->addTvToRepo($tv);

    return redirect('/adminpanel/addNewTv');
  }

  public function createTablet()
  {
      return view('admin/adminpanelviews/adminAddTablet');
  }


  public function showAdminTablets()
  {
    $this->tablets =  $this->mapper->getAllTablets();
    $tablets = $this->tablets; // cant send using compact without this

    foreach($tablets as $item){
      $flag = false;
    }
       return view ('admin/adminpanelviews/adminTablets', compact('tablets'));
   }

  public function storeTablet(Request $request)
  {
      $tablet = new Tablet($request->input('modelNumber'),$request->input('processor'),$request->input('screenSize'),
      $request->input('dimensions'),$request->input('ramSize'),$request->input('weight'),$request->input('cpucores'),
      $request->input('hddSize'),$request->input('batteryInformation'),$request->input('brandName'),$request->input('operatingSystem'),
      $request->input('cameraInformation'),$request->input('price'));

      $this->mapper->addTabletToRepo($tablet);
      return redirect('/adminpanel/addNewTablet');
  }

  public function createMonitor()
  {
      return view('admin/adminpanelviews/adminAddMonitor');
  }


  public function showAdminMonitors()
  {
    $this->monitors =  $this->mapper->getAllMonitors();
    $monitors = $this->monitors; // cant send using compact without this

    foreach($monitors as $item){
      $flag = false;
    }
       return view ('admin/adminpanelviews/adminMonitors', compact('monitors'));
   }

  public function storeMonitor(Request $request)
  {
      $monitor = new Monitor($request->input('modelNumber'), $request->input('size'), $request->input('weight'), $request->input('brandName'),
      $request->input('price'));

      $this->mapper->addMonitorToRepo($monitor);

      return redirect('/adminpanel/addNewMonitor');
  }

  //Edit Product
  public function edit($id, $productType)
  {
    if($productType == 'Desktop')
      $product = $this->mapper->getDesktopById($id);
    else if($productType == 'Laptop')
      $product = $this->mapper->getLaptopById($id);
    else if($productType == 'Tv')
      $product = $this->mapper->getTvById($id);
    else if($productType == 'Monitor')
      $product = $this->mapper->getMonitorById($id);
    else if($productType == 'Tablet')
      $product = $this->mapper->getTabletById($id);
    //$this->repo->getSingleDesktop($id);
    //$this->uow->getDesktopById($id);
    //$this->uow->commit();
    return view('admin/adminpanelviews/edit')->with('product', $product)->with('productType', $productType);
    //return view('admin/adminpanelviews/edit');
  }

  //Update Product in Database
  public function update(Request $request, $productType)
  {
      if($productType == 'Desktop')
      {
        $this->mapper->getAllDesktops();
        $product = $this->mapper->getDesktopById($request->oldModel);
        $product->setAll($request);
        $this->mapper->setDesktop($product, $request->oldModel);


        $this->desktops =  $this->mapper->getAllDesktops();
         $desktops = $this->desktops;

        return view ('admin/adminpanelviews/adminDesktops', compact('desktops'));
      }
      else if($productType == 'Laptop')
      {
        $this->mapper->getAllLaptops();
        $product = $this->mapper->getLaptopById($request->oldModel);
        $product->setAll($request);
        $this->mapper->setLaptop($product, $request->oldModel);
        $this->laptops =  $this->mapper->getAllLaptops();
        $laptops = $this->laptops;

        return view ('admin/adminpanelviews/adminLaptops', compact('laptops'));
      }
      else if($productType == 'Tv')
      {
        $this->mapper->getAllTvs();
        $product = $this->mapper->getTvById($request->oldModel);
        $product->setAll($request);
        $this->mapper->setTv($product, $request->oldModel);
        $this->tvs =  $this->mapper->getAllTvs();
        $tvs = $this->tvs;

        return view ('admin/adminpanelviews/adminTvs', compact('tvs'));
      }
      else if($productType == 'Monitor')
      {
        $this->mapper->getAllMonitors();
        $product = $this->mapper->getMonitorById($request->oldModel);
        $product->setAll($request);
        $this->mapper->setMonitor($product, $request->oldModel);
        $this->monitors =  $this->mapper->getAllMonitors();
        $monitors = $this->monitors;

        return view ('admin/adminpanelviews/adminMonitors', compact('monitors'));
      }
      else if($productType == 'Tablet')
      {
        $this->mapper->getAllTablets();
        $product = $this->mapper->getTabletById($request->oldModel);
        $product->setAll($request);
        $this->mapper->setTablet($product, $request->oldModel);
        $this->tablets =  $this->mapper->getAllTablets();
        $tablets = $this->tablets;

        return view ('admin/adminpanelviews/adminTablets', compact('tablets'));
      }
  }

  //Delete Product
  public function delete($id, $productType)
  {
     //return $id;
    if($productType == 'Desktop')
    {
      $this->mapper->getAllDesktops();
      $this->mapper->deleteDesktop($id);
      $this->desktops =  $this->mapper->getAllDesktops();
      $desktops = $this->desktops;
      return view ('admin/adminpanelviews/adminDesktops', compact('desktops'));
    }
    else if($productType == 'Laptop')
    {
      $this->mapper->getAllLaptops();
      $this->mapper->deleteLaptop($id);
      $this->laptops =  $this->mapper->getAllLaptops();
      $laptops = $this->laptops;
      return view ('admin/adminpanelviews/adminLaptops', compact('laptops'));
    }
    else if($productType == 'Tv')
    {
      $this->mapper->getAllTvs();
      $this->mapper->deleteTv($id);
      $this->tvs =  $this->mapper->getAllTvs();
      $tvs = $this->tvs;
      return view ('admin/adminpanelviews/adminTvs', compact('tvs'));
    }
    else if($productType == 'Monitor')
    {
      $this->mapper->getAllMonitors();
      $this->mapper->deleteMonitor($id);
      $this->monitors =  $this->mapper->getAllMonitors();
      $monitors = $this->monitors;
      return view ('admin/adminpanelviews/adminMonitors', compact('monitors'));
    }
    else if($productType == 'Tablet')
    {
      $this->mapper->getAllTablets();
      $this->mapper->deleteTablet($id);
      $this->tablets =  $this->mapper->getAllTablets();
      $tablets = $this->tablets;
      return view ('admin/adminpanelviews/adminTablets', compact('tablets'));
    }
  }

}
