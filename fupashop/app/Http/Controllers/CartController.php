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
use App\Items\SerialNumber;

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
        CartController::updateTotalsAndTax();

        // Sync the repo Cart
        session()->get('repo')->getCart()->syncCart( session()->get('sessionCart') );
        CartController::setFirstAvailableSNUnpurchasable( $itemModelNum );
        return back()->with('addAlert', 'Item added successfully to cart!');
    }

    //Remove an item from cart via model number
    public function deleteFromCart( Request $request )
    {
        $itemModelNum = $request->modelNumberToDel;
        $localCart = Session::get('sessionCart');
        $i = 0;
        foreach ($localCart as $item)
        {
          if ( $item )
          {
            if ( $itemModelNum == $item->getModelNumber() )
            {
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
        CartController::updateTotalsAndTax();
        session()->get('repo')->getCart()->syncCart( session()->get('sessionCart') );
        CartController::setFirstAvailableSNPurchasable( $itemModelNum );
        return back()->with('delAlert', 'Item deleted successfully from cart!');
    }

    // Getter for cart grand total
    public function getTotal()
    {
      if ( null != ( session()->get('cartTotal') ) )
      {
        return session()->get('cartTotal');
      }
      return 0;
    }

    // Getter for cart subtotal
    public function getSubtotal()
    {
      if ( null != ( session()->get('cartSubtotal') ) )
      {
        return session()->get('cartSubtotal');
      }
      return 0;
    }

    // Calculate the 15% tax
    public function calculateTax()
    {
      if ( null == ( session()->get('cartSubtotal') ) )
      {
        return 0;
      }
      //Round it down to 2 sig figs
      return round( session()->get('cartSubtotal')
                    * 0.15, 2, PHP_ROUND_HALF_DOWN) ;
    }

    // Update the cart subtotal
    public function updateTotalsAndTax()
    {
      $runningTotal = 0 ;
      if ( null != ( session('sessionCart') ) )
      {
        foreach( session('sessionCart') as $item )
        {
          $actualItem = $item;
          $runningTotal = $runningTotal + $actualItem->getPrice();
        }
      }
      session()->put( 'cartSubtotal', $runningTotal);
      session()->put( 'cartTax', CartController::calculateTax() );
      session()->put( 'cartTotal', session()->get('cartSubtotal')
                                           + session()->get('cartTax') );
    }

    // Retrieves an item from cart via its model number
    public function getCartItem($modelNumber)
    {
      if ( null != ( session('sessionCart') ) )
      {
        foreach( session('sessionCart') as $item )
        {
          if ($item->getModelNumber() == $modelNumber)
          {
            return $item;
          }
        }
      }
      return null;
    }

    // Syncs the Session variable cart with the cart object
    // inside the Repository
    public function updateCartInRepo()
    {
      session()->get('repo')->getCart()->syncCart( session()->get('sessionCart') );
    }

    public function setFirstAvailableSNUnpurchasable( $modelNum )
    {
      //
      $this->mapper->getStockByModelNumber( $modelNum, Tablet::class );
      $queryArray = $this->mapper->findSerialNumbersByModelNumber( $modelNum, Tablet::class );
      $itemToPushBackIntoRepo = null;
      foreach ( $queryArray as $item )
      {
        if ($item->getPurchasable() == true)
        {
          $itemToPushBackIntoRepo = $item;
          $itemToPushBackIntoRepo->setPurchasable(false);
          break;
        }
      }
      //FUNCTION TO PUSH THE ITEM BACK INTO REPO
      $this->mapper->updateSerialNumberInRepo( $itemToPushBackIntoRepo );
    }

    public function setFirstAvailableSNPurchasable( $modelNum )
    {
      //
      $this->mapper->getStockByModelNumber( $modelNum, Tablet::class );
      $queryArray = $this->mapper->findSerialNumbersByModelNumber( $modelNum, Tablet::class );
      $itemToPushBackIntoRepo = null;
      foreach ( $queryArray as $item )
      {
        if ($item->getPurchasable() == false)
        {
          $itemToPushBackIntoRepo = $item;
          $itemToPushBackIntoRepo->setPurchasable(true);
          break;
        }
      }
      //FUNCTION TO PUSH THE ITEM BACK INTO REPO
      $this->mapper->updateSerialNumberInRepo( $itemToPushBackIntoRepo );
    }
}
