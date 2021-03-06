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
        if ( !empty(session()->get('sessionCart') ) ){
          CartController::checkCartItemsTimings();
        }
        return view( 'cart' );
    }

    public function getViewDirName( $className )
    {
      switch($className)
      {
        case 'tablets':
          return 'App\Items\Tablet';
          break;
        case 'desktops':
          return 'App\Items\Desktop';
          break;
        case 'monitors':
          return 'App\Items\Monitor';
          break;
        case 'laptops':
          return 'App\Items\Laptop';
          break;
       // case 'App\Items\SerialNumber':
      //    return 'serialnumbers';
          break;
      }
      return null;
    }

    //Add an item's model number to cart
    public function addToCart( Request $request)
    {
      echo "<script>alert('called!');</script>";
        $itemModelNum = $request->modelNumber;
        $classDirName = CartController::getViewDirName( $request->class );

        if ( sizeof( session()->get('sessionCart') ) >= 7 )
        {
          return back()->with('addAlert', 'Maximum 7 items allowed in cart');
        }

        $item = $this->mapper->findItemByModelNumber( $itemModelNum, $classDirName );
        Session::push('sessionCart', $item );
        CartController::updateTotalsAndTax();

        // Sync the repo Cart
        $this->mapper->syncCartToRepo();
        CartController::setFirstAvailableSNUnpurchasable( $itemModelNum, get_class( $item ) );
        $item->decrementStock();
        $this->mapper->setItem($item, $item->getModelNumber());
         if($item->getStock() == 0 ||  session()->has('AdminItemToLock.'.$item->getModelNumber()))
        {

          session()->put('itemToLock.'.$item->getModelNumber(),true);
        }
        else
        {
          session()->forget('itemToLock.'.$item->getModelNumber());
        }
        return back()->with( 'addAlert', 'Item added successfully to cart!');
    }

    //Remove an item from cart via model number
    public function deleteFromCart( Request $request )
    {
        $itemModelNum = $request->modelNumberToDel;
        $className;
        $localCart = Session::get( 'sessionCart' );
        $i = 0;
        foreach ( $localCart as $item )
        {
          if ( $item )
          {
            if ( $itemModelNum == $item->getModelNumber() )
            {
              $className = get_class( $localCart[$i] );
              // Unset that particular index of local tmp cart
              unset( $localCart[$i] );
              $updatedLocalCart = array_values( $localCart );
              // Forget the sessionCart session variable
              $request->session()->forget( 'sessionCart' );
              // Set it to the updated one without the spec'd item
              $request->session()->put( 'sessionCart', $updatedLocalCart );

              $cartSerials = $request->session()->get('sessionSerials');
              unset( $cartSerials[$i] );
              $updatedSerialsCart = array_values( $cartSerials );
              $request->session()->forget( 'sessionSerials' );
              $request->session()->put( 'sessionSerials', $updatedSerialsCart );
              // Update stock in repo
              $item->incrementStock();
              $this->mapper->setItem($item, $item->getModelNumber());
              break;
            }
            $i++;
          }
        }
        CartController::updateTotalsAndTax();
        $this->mapper->syncCartToRepo();
        CartController::setFirstAvailableSNPurchasable( $itemModelNum , $className );
        return back()->with( 'delAlert', 'Item deleted successfully from cart!' );
    }

    // Finalize the checkout of the Cart
    public function checkout()
    {
      //First, we have to add the items from cart into the transaction history table
      $this->mapper->createTransaction( session()->get('sessionCart'), session()->get('sessionSerials') );

      //Clear the session cart and sync with repo Cart
      session()->forget( 'sessionCart' );
      $newCart = array();
      session()->put( 'sessionCart', $newCart );

      // update the totals and tax values in the Session ( 0, 0 , 0)
      CartController::updateTotalsAndTax();

      // sync the sessionCart with the repo cart AKA EMPTY IT
      $this->mapper->syncCartToRepo();

      //Remove items from shoppingCart table
      foreach ( session()->get('sessionSerials') as $snObject )
      {
        $this->mapper->delFromShoppingCartTable( $snObject->getSerialNumber() );
      }
      session()->forget( 'sessionSerials' );
      $newSCart = array();
      session()->put( 'sessionSerials', $newSCart );

      return back()->with( 'delAlert', 'Checkout complete');
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
      if ( null != ( session()->get( 'cartSubtotal' ) ) )
      {
        return session()->get( 'cartSubtotal' );
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
      if ( null != ( session( 'sessionCart' ) ) )
      {
        foreach( session( 'sessionCart' ) as $item )
        {
          $actualItem = $item;
          $runningTotal = $runningTotal + $actualItem->getPrice();
        }
      }
      session()->put( 'cartSubtotal', $runningTotal );
      session()->put( 'cartTax', CartController::calculateTax() );
      session()->put( 'cartTotal', session()->get( 'cartSubtotal' )
                                           + session()->get( 'cartTax' ) );
    }

    // Retrieves an item from cart via its model number
    public function getCartItem( $modelNumber )
    {
      if ( null != ( session( 'sessionCart' ) ) )
      {
        foreach( session( 'sessionCart' ) as $item )
        {
          if ( $item->getModelNumber() == $modelNumber )
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
      $this->mapper->syncCartToRepo();
    }

    // Function to release items from cart back to inventory after 3 minutes
    // To be called everytime user clicks "cart"
    public function checkCartItemsTimings()
    {
      //Get an array of every serial number in cart as Strings
      $snStrings = array();
      if(session()->exists( 'sessionSerials' )){
        foreach ( session()->get( 'sessionSerials' ) as $item )
        {
          if($item != null)
            array_push( $snStrings, $item->getSerialNumber() );
        }
      }
      //Pass the serials through mapper
      if ( !empty( $snStrings ) )
      {
        $this->mapper->checkCartTimingsBySN( $snStrings );
      }
      CartController::updateTotalsAndTax();
    }

    public function setFirstAvailableSNUnpurchasable( $modelNum, $className )
    {
      //Need to get the $item first and get its type
      $this->mapper->getStockByModelNumber( $modelNum, $className );
      $queryArray = $this->mapper->findSerialNumbersByModelNumber( $modelNum, $className );
      $itemToPushBackIntoRepo = null;
      foreach ( $queryArray as $item )
      {
        if ( $item->getPurchasable() == true )
        {
          $itemToPushBackIntoRepo = $item;
          $itemToPushBackIntoRepo->setPurchasable( false );
          break;
        }
      }
      if ( session()->get('sessionSerials') == null )
      {
        session()->put('sessionSerials', array() );
      }

        session()->push('sessionSerials', $itemToPushBackIntoRepo);
        $this->mapper->addSerialToCart($itemToPushBackIntoRepo);

        //Add $itemToPushBackIntoRepo into a shoppingCarts
        $this->mapper->addSerialToShoppingCartTable( $itemToPushBackIntoRepo );

        //FUNCTION TO PUSH THE ITEM BACK INTO REPO
        $this->mapper->updateSerialNumberInRepo( $itemToPushBackIntoRepo );

    }

    public function setFirstAvailableSNPurchasable( $modelNum, $className )
    {
      $this->mapper->getStockByModelNumber( $modelNum, $className );
      $queryArray = $this->mapper->findSerialNumbersByModelNumber( $modelNum, $className );
      $itemToPushBackIntoRepo = null;
      foreach ( $queryArray as $item )
      {
        if ( $item->getPurchasable() == false )
        {
          $itemToPushBackIntoRepo = $item;
          $itemToPushBackIntoRepo->setPurchasable( true );
          break;
        }
      }
      $this->mapper->deleteSerialFromCartRepo($itemToPushBackIntoRepo);
     
                                         //Add $itemToPushBackIntoRepo into a shoppingCarts
      $this->mapper->deleteSerialFromShoppingCartTable( $itemToPushBackIntoRepo );
      //FUNCTION TO PUSH THE ITEM BACK INTO REPO
      $this->mapper->updateSerialNumberInRepo( $itemToPushBackIntoRepo );
    }
}
