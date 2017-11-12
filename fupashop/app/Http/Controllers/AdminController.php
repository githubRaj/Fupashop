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
                  'ramSize' => array('required', 'regex:/(?i)^[0-9]+gb$/', 'max:20'),  //case insensitive and must have gb at the end
                  'weight' => array('required', 'numeric', 'regex:/^[0-9]{1,8}.[0-9]{2}$/'),  //must have a maximum of 2 decimal points
                  'cpuCores' => 'required|max:20',
                  'hddSize' => array('required', 'regex:/^[0-9]+(GB|TB)$/' , 'max:20'),
                  'brandName' => 'required|max:20',
                  'price' => array('required', 'numeric', 'regex:/^[0-9]{1,8}.[0-9]{2}$/'),  //must ahve 2 decimal places
              ],
               ['weight.regex' => 'The weight field must contain 2 decimal points.',
                'ramSize.regex' => 'The ram size field must be a number and must end with the unit GB.',
                'price.regex' => 'The price field must contain 2 decimal points.',
                'hddSize.regex' => 'The HDD Size field must be a number and must end with the unit TB or GB.'
              ]);
        }

        if($item == 'laptops')
        {
              $request->validate([
                  'processor' => 'required|max:20',
                  'displaySize' => array('required', 'numeric', 'regex:/^[0-9]{1,5}.[0-9]{1}$/'),  //must have  1 decimal point
                  'ramSize' => array('required', 'regex:/(?i)^[0-9]+gb$/', 'max:20'),  //case insensitive and must have gb at the end
                  'weight' => array('required', 'numeric', 'regex:/^[0-9]{1,8}.[0-9]{2}$/'),  //must have a maximum of 2 decimal points
                  'cpuCores' => 'required|max:20',
                  'hddSize' => array('required', 'regex:/^[0-9]+(GB|TB)$/' , 'max:20'),//must contain gb or tb at the end
                  'batteryType' => 'required|max:20',
                  'batteryInformation' => 'required|max:20',
                  'brandName' => 'required|max:30',
                  'operatingSystem' => 'required|max:20',
                  'touchFeature' => array('required', 'numeric', 'regex:/^(0|1)$/', 'max:1', 'digits:1'), //touch feature must be a 0 or a 1
                  'cameraInformation' => 'required|max:40',
                  'price' => array('required', 'numeric', 'regex:/^[0-9]{1,8}.[0-9]{2}$/'),   //must ahve 2 decimal places
              ],
               ['weight.regex' => 'The weight field must contain 2 decimal points.',
                'displaySize.regex' => 'The Display Size field must contain a decimal point.',
                'ramSize.regex' => 'The Ram Size field must be a number and must end with the unit GB.',
                'hddSize.regex' => 'The HDD Size field must be a number and must end with the unit TB or GB.',
                'touchFeature.regex' => 'The Touch Feature field must either be a 1 or a 0.',
                'price.regex' => 'The Price field must contain 2 decimal points.',
              ]);
        }

        if($item == 'tablets')
        {
              $request->validate([
                //  'modelNumber' => 'required|unique:laptops|max:20',
                  'processor' => 'required|max:20',
                  'screenSize' => array('required', 'numeric', 'regex:/^[0-9]{1,5}.[0.9]{1}$/'),  //must have  1 decimal point
                  'dimensions' => 'required|max:40',
                  'ramSize' => array('required', 'regex:/(?i)^[0-9]+gb$/', 'max:20'),  //case insensitive and must have gb at the end
                  'weight' => array('required', 'numeric', 'regex:/^[0-9]{1,8}.[0-9]{2}$/'),  //must have a maximum of 2 decimal points
                  'cpuCores' => 'required|max:20',
                  'hddSize' => array('required', 'regex:/(?i)^[0-9]+(gb|tb)$/' , 'max:20'),//must contain gb or tb at the end
                  'batteryInformation' => 'required|max:20',
                  'brandName' => 'required|max:30',
                  'operatingSystem' => 'required|max:20',
                  'cameraInformation' => 'required|max:40',
                  'price' => array('required', 'numeric', 'regex:/^[0-9]{1,8}.[0-9]{2}$/'),   //must ahve 2 decimal places
              ],
               ['weight.regex' => 'The weight field must contain 2 decimal points.',
                'screenSize.regex' => 'The Screen Size field must contain a decimal point.',
                'ramSize.regex' => 'The Ram Size field must be a number and must end with the unit GB.',
                'hddSize.regex' => 'The HDD Size field must be a number and must end with the unit TB or GB.',
                'price.regex' => 'The Price field must contain 2 decimal points.',
              ]);
        }

        if($item == 'monitors')
        {
              $request->validate([
                //  'modelNumber' => 'required|unique:desktops|max:20',
                  'size' => 'required|max:11',
                  'weight' => array('required', 'numeric', 'regex:/^[0-9]{1,8}.[0-9]{2}$/'),  //must have a decimal point
                  'brandName' => 'required|max:20',
                  'price' => array('required', 'numeric', 'regex:/^[0-9]{1,8}.[0-9]{2}$/'),  //must ahve 2 decimal places
              ],
               ['weight.regex' => 'The weight field must contain a decimal.',
                'price.regex' => 'The Price field must contain 2 decimal points.',
              ]);
        }
    }

    //SAVE TO REPO
    public function saveNewItem(Request $request, $item){
      //validation
      $this->validateRequest($request, $item, 'add');

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
      //validation, requires some more work, we won't need to verify modelnumber, as it won't be edited
      $this->validateRequest($request, $productType, 'edit');

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
    //validation
    $request->validate([
      'serialNumber' => 'required|unique:serialNumbers|max:11'
    ]);

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
