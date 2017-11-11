<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items\Desktop;
use App\Items\Laptop;
use App\Items\Monitor;
use App\Items\Tablet;
use App\Mapper\Mapper;
use App\Items\SerialNumber;
use Session;
use App\User;


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
    }

    return null;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layouts');
    }

/*================================================================
                        START - GET VIEWS
================================================================*/
  public function desktopIndex()
  {
    return $this->getIndex(Desktop::class);
  }

  public function laptopIndex()
  {
    return $this->getIndex(Laptop::class);
  }
  public function tabletIndex()
  {
    return $this->getIndex(Tablet::class);
  }
  public function monitorIndex()
  {
    return $this->getIndex(Monitor::class);
  }
  public function userIndex()
  {
    $users = User::all();
    return view( 'admin.users.info' )->with( compact( 'users' ) );
  }

   // Generic index page fetcher.
    public function getIndex($className)
    {

      // Fetch all items of a given class
      $dirName = $this->getViewDirName($className);
      $items =  $this->mapper->findAllItemsByClass($className);

      return view ('admin.'.$dirName.'.info', compact('items'));
    }
/*================================================================
                        END - GET VIEWS
================================================================*/
     //VIEW OF ADDING NEW ITEMS
    public function creationFormView($item){
      return view('admin.'.$item.'.add');
    }

    public function getClassName($item){
      switch ($item) {
        case 'desktops':
          return 'App\Items\Desktop';
        case 'laptops':
           return 'App\Items\Laptop';
        case 'tablets':
           return 'App\Items\Tablet';
        case 'monitors':
          return 'App\Items\Monitor';
        case 'serialNumbers':
          return 'App\Items\SerialNumber';
        default:
          # code...
          break;
      };
    }

    //SAVE TO REPO
    public function saveNewItem(Request $request, $item){

      $this->mapper->makeNewItem($request, $this->getClassName($item));
      return redirect('/admin');   //<----- should be direct to a page stating success or fail. temporary redirect
    }


  //Edit Product
  public function editView($productType, $id)
  {
    $item = $this->mapper->findItemByModelNumber($id, $this->getClassName($productType));
    return view('admin/edit', compact('item','productType'));
  }

  //Update Product in Database
  public function update(Request $request, $productType)
  {
      $className = $this->getClassName($productType);
      $this->mapper->findAllItemsByClass($className);

      $item = $this->mapper->findItemByModelNumber($request->oldModel, $className);

      $item->setAttributes($request->all());

      $this->mapper->setItem($item, $request->modelNumber);
      $items =  $this->mapper->findAllItemsByClass($className);

      return view ('admin.'.$productType.'.info', compact('items'));
  }

  //Delete Product
  public function delete($productType, $id, Request $request)
  {
      $className = $this->getClassName($productType);
      $this->mapper->findAllItemsByClass($className);

      if($className == SerialNumber::class){
        $item = $this->mapper->findItembySerialNumber($id, $request->serialNumber);
      }
      else{
        $item = $this->mapper->findItemByModelNumber($id, $className);
      }
      $this->mapper->eraseItem($item);
      return back();

  }

  //Create form for Serial Numbers
  public function CreateSerialForm($productType)
  {
     $className = $this->getClassName($productType);
     $modelNumbers =  $this->mapper->findAllItemsByClass($className);

     return view('admin/SerialNumbers/add', compact('modelNumbers', 'productType'));
  }

  //Submit Serial Number
  public function SaveSerial(Request $request)
  {
     $this->mapper->makeNewItem($request, 'App\Items\SerialNumber');
     return redirect('admin'); //<----TODO redirect properly
  }

  //View Serial Numbers
  public function viewSerial($productType,$modelNumber)
  {
    $className = $this->getClassName($productType);
    $serialNumbers = $this->mapper->findSerialNumbersByModelNumber($modelNumber, $className);
    return view('admin/SerialNumbers/info', compact('serialNumbers'));
  }

}
