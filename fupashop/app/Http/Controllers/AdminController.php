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
use Session;


class AdminController extends Controller
{
  private $repo;
  private $mapper;
  private $uow;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->mapper = new Mapper();
        $this->repo = new Repository();
        $this->uow = new UOW($this->mapper);
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

          $this->repo->addDesktopToRepo($desktop);

          $this->uow->registerNew($desktop);

          $this->uow->commit();

          //return redirect('/adminpanel/addNewDesktop');
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
    $repo = new Repository();
    $laptop = new Laptop;
    $laptop->modelNumber = $request->input('modelNumber');
    $laptop->processor = $request->input('processor');
    $laptop->displaySize = $request->input('displaySize');
    $laptop->ramSize = $request->input('ramSize');
    $laptop->weight = $request->input('weight');
    $laptop->cpuCores = $request->input('cpuCores');
    $laptop->hddSize = $request->input('hddSize');
    $laptop->batteryType = $request->input('batteryType');
    $laptop->batteryInformation = $request->input('batteryInformation');
    $laptop->brandName = $request->input('brandName');
    $laptop->operatingSystem = $request->input('operatingSystem');
    $laptop->touchFeature = $request->input('touchFeature');
    $laptop->cameraInformation = $request->input('cameraInformation');
    $laptop->price = $request->input('price');

    $repo->addLaptopToRepo($laptop);

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
      return redirect('/adminpanel/addNewMonitor');
  }

  //Edit Product
  public function edit($id)
  {
    /*$this->repo->getSingleDesktop($id);
    $this->uow->getDesktopById($id);
    $this->uow->commit();
    */
    //return view('admin/adminpanelviews/edit')->with('product', $product);
    return view('admin/adminpanelviews/edit');
  }

  //Update Product in Database
  public function update(Request $request, $id)
  {
     return 'Product has been updated';
  }

  //Delete Product
  public function delete($id)
  {
     return $id;
  }

}
