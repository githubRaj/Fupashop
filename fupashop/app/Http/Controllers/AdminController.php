<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items\Desktop;
use App\Items\Laptop;
use App\Items\Monitor;
use App\Items\Tablet;
use App\Mapper\Mapper;
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

      $item[0]->setAttributes($request->all());

      $this->mapper->setItem($item[0], $request->modelNumber);
      $items =  $this->mapper->findAllItemsByClass($className);

      return view ('admin.'.$productType.'.info', compact('items'));
  }

  //Delete Product
  public function delete($productType, $id)
  {
      $className = $this->getClassName($productType);
      $this->mapper->findAllItemsByClass($className);
      $item = $this->mapper->findItemByModelNumber($id, $className);
      $this->mapper->eraseItem($item[0]);
      $items =  $this->mapper->findAllItemsByClass($className);

      return view ('admin.'.$productType.'.info', compact('items'));
  }

  public function CreateSerialForm($productType)
  {
    if($productType == 'desktops')
    {
        $type = 'desktop';
        $className = $this->getClassName($productType);
        $modelNumbers =  $this->mapper->findAllItemsByClass($className);
   }
   else if($productType == 'laptops')
   {
       $type = 'laptop';
       $className = $this->getClassName($productType);
       $modelNumbers =  $this->mapper->findAllItemsByClass($className);
   }
   else if($productType == 'tablets')
   {
       $type = 'tablet';
       $className = $this->getClassName($productType);
       $modelNumbers =  $this->mapper->findAllItemsByClass($className);
   }
   else if($productType == 'monitors')
   {
       $type = 'monitor';
       $className = $this->getClassName($productType);
       $modelNumbers =  $this->mapper->findAllItemsByClass($className);
   }

     return view('admin/SerialNumbers/add', compact('modelNumbers', 'type'));
  }

  public function SaveSerial(Request $request)
  {
     $this->mapper->makeNewItem($request, 'App\Items\SerialNumber');
     return redirect('admin');
  }

}
