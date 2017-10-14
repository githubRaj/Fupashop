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
  private $mapper;
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
      $repo = new Repository();
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
      //$desktop->save();
      $repo->addDesktopToRepo($desktop);

      return redirect('/adminpanel/addDesktop')->with('success', 'Product Added!');
    }

    public function showAdminDesktops()
   {
     $this->desktops =  $this->mapper->getAllDesktops();

     $desktops = $this->desktops;

     $brands = array();
     foreach($desktops as $item){
       $flag = false;
     }
     return view ('admin/adminpanelviews/adminDesktops', compact('desktops'));
   }
}
