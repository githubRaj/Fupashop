<?php

namespace App;

use App\Items\Item;
use Auth;

class Cart
{
    private $cartItems;
    private $totalQty;
    private $totalPrice;

    public function __construct()
    {
        $this->cartItems = array();
        $this->totalQty = 0;
        $this->totalPrice = 0;
    }

    //GETTERS//
    public function getCartItemsArray()
    {
      return $this->cartItems;
    }

    public function getTotalQty()
    {
      return $this->totalQty;
    }

    public function getTotalPrice()
    {
      return $this->totalPrice;
    }

    //MAIN FUNCTIONS//

    // ================================================== //
    // ====THIS IS THE MAIN FUNCTION OF THIS CLASS ====== //
    // ================================================== //
    // FUNCTION: SYNCS THE CART OBJECT IN REPO WITH THE
    // SESSION VARIABLE SESSIONCART. TO BE CALLED EACH TIME
    // CLIENT CLICKS ADD TO CART
    public function syncCart( $sessionCartArray )
    {
      // Init a new array
      $cartToSync = array();
      // Add all sessionCartItems into this array
      $qtyCount = 0;
      foreach( $sessionCartArray as $itemToAdd )
      {
        array_push( $cartToSync, $itemToAdd );
        $qtyCount++;
      }
      // Set this new array as the current CartArray
      $this->cartItems = $cartToSync;
      // Update the total price of the cart
      Cart::updateTotalPrice();
      // Update the total qty of the cart
      $this->totalQty = $qtyCount;
    }

    //Add item to cart object
    public function addItemToCart( $item ){
      $this->cartItems[] = $item;
      Cart::updateTotalPrice();
    }

    //Remove existing item in Cart
    public function removeItemFromCartById($itemModelNum)
    {
      if ( !empty($this->cartItems) )
      {
        $i = 0;
        foreach ( $this->cartItems as $item )
        {
          if ( $item )
          {
            if ( $item->getModelNumber() == $itemModelNum )
            {
              unset($this->cartItems[i]);
              break;
            }
            $i++;
          }
        }
      }
      else
      {
        echo "Cart is empty. Cannot Remove";
      }
      Cart::updateTotalPrice();
    }

    public function updateTotalPrice()
    {
      $cartTotal = 0;
      if ( !(Cart::isEmpty()) )
      {
        foreach ( $this->cartItems as $item )
        {
          if ( $item )
          {
            $actualItem = $item[0];
            $cartTotal = $cartTotal + $actualItem->getPrice();
          }
        }
        $this->totalPrice = $cartTotal;
      }
    }

    //Check if cart is empty
    public function isEmpty()
    {
        if ( !empty( $this->cartItems ) )
        {
          return false;
        }
        return true;
    }

    // DEBUG: Print cart debugging function
    public function printCart()
    {
      if ( !(isEmpty() ) )
      {
        foreach( $this->cartItems as $item )
        {
          echo $item->getModelNumber();
          echo "\r" ;
        }
      }
      else
      {
        echo "Cart is empty in Cart.php";
      }
    }
}
