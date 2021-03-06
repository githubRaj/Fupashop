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
use App\Admin;


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
    $systemID = session()->get('system.id');
    $systemTStamp = session()->get('system.timeStamp');
    $users = User::all();
    foreach($users as $user){
      $flag = false;
      for($i = 0; $i < sizeof($systemID); $i++){
        if($systemID[$i] == $user->email){
          $flag = true;
          $user->status = 'logged in';
          $user->timeStamp = $systemTStamp[$i];
        }
      }
      if(!$flag){
        $user->status = 'logged out';
        $user->timeStamp = '-';
      }

    }
    $admins = Admin::all();
   foreach($admins as $user){
      $flag = false;
      for($i = 0; $i < sizeof($systemID); $i++){
        if($systemID[$i] == $user->email){
          $flag = true;
          $user->status = 'logged in';
          $user->timeStamp = $systemTStamp[$i];
        }
      }
      if(!$flag){
        $user->status = 'logged out';
        $user->timeStamp = '-';
      }

    }
    return view( 'admin.users.info' )->with( compact( 'users','admins' ) );
  }

   // Generic index page fetcher.
    public function getIndex($className)
    {

      // Fetch all items of a given class
      $dirName = $this->getViewDirName($className);
      $items =  $this->mapper->findAllItemsByClass($className);
      foreach ($items as $item)
      {
        $itemAttributes = $item->getAttributes();


        $this->mapper->initializeItemStock($item, $className);
        if($this->mapper->findItemByModelNumber($item->getModelNumber(), $className)->getStock() == 0 ||  session()->has('AdminItemToLock.'.$item->getModelNumber()) ){

          session()->put('itemToLock.'.$item->getModelNumber(),true);
        }
        else
        {
          session()->forget('itemToLock.'.$item->getModelNumber());
        }

      }

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

    public function validateRequest($request, $item, $formType)
    {
        //validation will be moved here, so that both the update and saveNewItem functions can use the validation
        if($formType == 'add')
        {
            if($item == 'desktops')
              $request->validate(['modelNumber' => 'required|unique:desktops|max:20',]);
            if($item == 'laptops')
              $request->validate(['modelNumber' => 'required|unique:laptops|max:20',]);
            if($item == 'tablets')
              $request->validate(['modelNumber' => 'required|unique:tablets|max:20',]);
            if($item == 'monitors')
              $request->validate(['modelNumber' => 'required|unique:monitors|max:20',]);
        }

        if($item == 'desktops')
        {
              $request->validate([
                  'processor' => 'required|max:20',
                  'dimensions' => 'required|max:21',
                  'ramSize' => array('required', 'regex:/^[0-9]+(MB|GB)$/', 'max:20'),  //case insensitive and must have gb at the end
                  'weight' => array('required', 'numeric', 'regex:/^(([0-9]{1,10})|([0-9]{1,8}\.([0-9]|[0-9][0-9])))$/'),  //must have a maximum of 2 decimal points
                  'cpuCores' => 'required|max:20',
                  'hddSize' => array('required', 'regex:/^[0-9]+(GB|TB|MB|PB)$/' , 'max:20'),//must contain gb or tb at the end
                  'brandName' => 'required|max:20',
                  'price' => array('required', 'numeric', 'regex:/^(([0-9]{1,10})|([0-9]{1,8}\.([0-9]|[0-9][0-9])))$/'),   //must ahve 2 decimal places
              ],
               ['weight.regex' => 'The weight field length must be between 1 and 10 numerical digits and may only have a maximum of 2 decimal points',
                'ramSize.regex' => 'The Ram Size field must be a number and must end with the unit MB or GB.',
                'price.regex' => 'The Price field length must be between 1 and 10 numerical digits and may only have a maximum of 2 decimal points',
                'hddSize.regex' => 'The HDD Size field must be a number and must end with the unit MB, GB, TB or PB.',
              ]);
        }

        if($item == 'laptops')
        {
              $request->validate([
                  'processor' => 'required|max:20',
                  'displaySize' => array('required', 'numeric', 'regex:/^.{1,6}$/'),  //must have  1 decimal point
                  'ramSize' => array('required', 'regex:/^[0-9]+(MB|GB)$/', 'max:20'),  //case insensitive and must have gb at the end
                  'weight' => array('required', 'numeric', 'regex:/^(([0-9]{1,10})|([0-9]{1,8}\.([0-9]|[0-9][0-9])))$/'),  //must have a maximum of 2 decimal point
                  'cpuCores' => 'required|max:20',
                  'hddSize' => array('required', 'regex:/^[0-9]+(GB|TB|MB|PB)$/' , 'max:20'),//must contain gb or tb at the end
                  'batteryType' => 'required|max:20',
                  'batteryInformation' => 'required|max:20',
                  'brandName' => 'required|max:30',
                  'operatingSystem' => 'required|max:20',
                  'touchFeature' => array('required', 'numeric', 'regex:/^(0|1)$/', 'max:1', 'digits:1'), //touch feature must be a 0 or a 1
                  'cameraInformation' => 'required|max:40',
                  'price' => array('required', 'numeric', 'regex:/^(([0-9]{1,10})|([0-9]{1,8}\.([0-9]|[0-9][0-9])))$/'),   //must ahve 2 decimal places
              ],
               ['weight.regex' => 'The weight field length must be between 1 and 10 numerical digits and may only have a maximum of 2 decimal points',
                'displaySize.regex' => 'The Display Size field length must be between 1 and 6 digits.',
                'ramSize.regex' => 'The Ram Size field must be a number and must end with the unit MB or GB.',
                'hddSize.regex' => 'The HDD Size field must be a number and must end with the unit MB, GB, TB or PB.',
                'touchFeature.regex' => 'The Touch Feature field must either be a 1 or a 0.',
                'price.regex' => 'The Price field length must be between 1 and 10 numerical digits and may only have a maximum of 2 decimal points',
              ]);
        }

        if($item == 'tablets')
        {
              $request->validate([
                //  'modelNumber' => 'required|unique:laptops|max:20',
                  'processor' => 'required|max:20',
                  'screenSize' => array('required', 'numeric', 'regex:/^.{1,6}$/'),  //must have  1 decimal point
                  'dimensions' => 'required|max:40',
                  'ramSize' => array('required', 'regex:/^[0-9]+(MB|GB)$/', 'max:20'),  //case insensitive and must have gb at the end
                  'weight' => array('required', 'numeric', 'regex:/^(([0-9]{1,10})|([0-9]{1,8}\.([0-9]|[0-9][0-9])))$/'),  //must have a maximum of 2 decimal point
                  'cpucores' => 'required|max:20',
                  'hddSize' => array('required', 'regex:/^[0-9]+(GB|TB|MB|PB)$/' , 'max:20'),//must contain gb or tb at the end
                  'batteryInformation' => 'required|max:20',
                  'brandName' => 'required|max:30',
                  'operatingSystem' => 'required|max:20',
                  'cameraInformation' => 'required|max:40',
                  'price.regex' => 'The Price field length must be between 1 and 10 digits and may only have a maximum of 2 decimal points',s
              ],
               ['weight.regex' => 'The weight field length must be between 1 and 10 and may only have a maximum of 2 decimal points',
                'screenSize.regex' => 'The Screen Size field length must be between 1 and 6 digits.',
                'ramSize.regex' => 'The Ram Size field must be a number and must end with the unit MB or GB.',
                'hddSize.regex' => 'The HDD Size field must be a number and must end with the unit MB, GB, TB or PB.',
                'price.regex' => 'The Price field length must be between 1 and 10 numerical digits and may only have a maximum of 2 decimal points.',
              ]);
        }

        if($item == 'monitors')
        {
              $request->validate([
                //  'modelNumber' => 'required|unique:desktops|max:20',
                  'size' => 'required|numeric',
                  'weight' => array('required', 'numeric', 'regex:/^(([0-9]{1,10})|([0-9]{1,8}\.([0-9]|[0-9][0-9])))$/'),  //must have a maximum of 2 decimal point
                  'brandName' => 'required|max:20',
                  'price' => array('required', 'numeric', 'regex:/^(([0-9]{1,10})|([0-9]{1,8}\.([0-9]|[0-9][0-9])))$/'),   //must ahve 2 decimal places
              ],
               ['weight.regex' => 'The weight field length must be between 1 and 10 numerical digits and may only have a maximum of 2 decimal points',
                'price.regex' => 'The Price field length must be between 1 and 10 numerical digits and may only have a maximum of 2 decimal points',
              ]);
        }
    }

    //SAVE TO REPO
    public function saveNewItem(Request $request, $item){
      //validation
      $this->validateRequest($request, $item, 'add');

      $this->mapper->makeNewItem($request, $this->getClassName($item));
      Session::flash('success', 'The item '.$request->modelNumber.' was succesfully created!');

      return redirect('/admin/'.$item);
    }


  //Edit Product
  public function editView($productType, $id)
  {
    $item = $this->mapper->findItemByModelNumber($id, $this->getClassName($productType));
    session()->put('AdminItemToLock.'.$item->getModelNumber(),true); //lock item once admin begins editing
    return view('admin/edit', compact('item','productType'));
  }

  //Update Product in Database
  public function update(Request $request, $productType)
  {
      //validation, requires some more work, we won't need to verify modelnumber, as it won't be edited
      $this->validateRequest($request, $productType, 'edit');

      $className = $this->getClassName($productType);
      //$this->mapper->findAllItemsByClass($className);

      $item = $this->mapper->findItemByModelNumber($request->oldModel, $className);

      $item->setAttributes($request->all());

      $this->mapper->setItem($item, $request->modelNumber);
      $items =  $this->mapper->findAllItemsByClass($className);
      Session::flash('success', 'The item '.$request->modelNumber.' was succesfully edited!');
      session()->forget('AdminItemToLock.'.$item->getModelNumber());  //unlockitem once admin has finished editing it
      return redirect('/admin/'.$productType);
  }

  //Delete Product
  public function delete($productType, $id, Request $request)
  {
      $className = $this->getClassName($productType);
      $this->mapper->findAllItemsByClass($className);

      if($className == SerialNumber::class){
        $item = $this->mapper->findItembySerialNumber($id, $request->serialNumber);
        $className = $this->getClassName($request->superClass);

        $type='Serial';
      }
      else{
        $item = $this->mapper->findSerialNumbersByModelNumber($id, $className);
        $type = 'Item';
      }
      //echo var_dump($className,$productType,$item);
      $this->mapper->disableItem($item,$type, $className);
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
  { //validation
    $request->validate([
      'serialNumber' => 'required|unique:serialnumbers|max:11'
    ]);

     $this->mapper->makeNewItem($request, 'App\Items\SerialNumber');
     $className = $this->getClassName($request->type);
     $newItem = $this->mapper->findItemByModelNumber($request->modelNumber, $className);
     $newItem->incrementStock();
     $this->mapper->setItem($newItem, $request->modelNumber);
     Session::flash('success', 'The serial '.$request->serialNumber.' was succesfully created!');


     return redirect('admin/viewSerial/desktops/'.$request->modelNumber);
  }

  //View Serial Numbers
  public function viewSerial($productType,$modelNumber)
  {
    $className = $this->getClassName($productType);
    $serialNumbers = $this->mapper->findSerialNumbersByModelNumber($modelNumber, $className);
    return view('admin/SerialNumbers/info', compact('serialNumbers', 'modelNumber', 'productType'));
  }

}
