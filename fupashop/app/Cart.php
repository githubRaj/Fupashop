<?php

namespace App;

use App\Items\Item;
use App\Items\Tablet;
use App\Mapper\Mapper;
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
    //Add item to cart object
    public function addItemToCart( $item ){
      // First, obtain the $item object via it's model number
      $this->cartItems[] = $item;
      //array_push( $this->cartItems, $item );

      //echo 'In the Cart.php: ';
      //var_dump( $this->cartItems );
      //TODO: handle temporary removal from db via tdg
      // ->SET $item->purchaseable = false
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
          if ( isset( $item ) )
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
            $cartTotal = $cartTotal + $item->getPrice();
          }
        }
        $this->totalPrice = $cartTotal;
      }
    }

    //Check if cart is empty
    public function isEmpty(){
        if ( !empty( $this->cartItems ) )
        {
          return false;
        }
        return true;
    }
}
