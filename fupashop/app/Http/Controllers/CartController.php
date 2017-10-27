<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

use Auth;
use App\User;
use App\Cart;
use App\Items\Tv;
use App\Items\Desktop;
use App\Items\Laptop;
use App\Items\Monitor;
use App\Items\Tablet;
use App\Mapper\Mapper;

class CartController extends Controller
{
    private $mapper;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->mapper = new Mapper();
    }

    /**
     * Show the cart
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart');
    }

    //Add an item's model number to cart
    public function addToCart( Request $request)
    {
        $itemModelNum = $request->modelNumber;
        $item = $this->mapper->findItemByModelNumber( $itemModelNum, 'App\Items\Tablet' );
        Session::push('sessionCart', $item );

        echo var_dump( session()->get('sessionCart'));

        return back()->with('addAlert', 'Item added successfully to cart!');
    }

    //Remove an item from cart via model number
    public function deleteFromCart( Request $request )
    {
        $itemModelNum = $request->modelNumberToDel;
        $localCart = Session::get('sessionCart');
        $i = 0;
        foreach ($localCart as $item){
          if ( $item )
          {
            if ( $itemModelNum == $item->getModelNumber() ){
              // Unset that particular index of local tmp cart
              unset($localCart[$i]);
              $updatedLocalCart = array_values($localCart);
              // Forget the sessionCart session variable
              $request->session()->forget('sessionCart');
              // Set it to the updated one without the spec'd item
              $request->session()->put('sessionCart', $updatedLocalCart);
              break;
            }
            $i++;
          }
        }
        return back()->with('delAlert', 'Item deleted successfully from cart!');
    }

    public function updateUserCart()
    {

    }
}
