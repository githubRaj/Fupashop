<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    private $userID;
    private $modelNumber;
    private $serialNumber;
    private $price;
    private $created_at;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $table = 'purchasecollection';

    protected $fillable = [
         'userID', 'modelNumber', 'serialNumber', 'price', 'created_at',
    ];

    public void getUserId()
    {
      return $this->userId;
    }

    public void getModelNumber()
    {
      return $this->modelNumber;
    }

    public void getSerialNumber()
    {
      return $this->serialNumber;
    }

    public void getPrice()
    {
      return $this->price;
    }

    public void getCreatedAt()
    {
      return $this->created_at;
    }

    public void setModelNumber( $mn )
    {
      $this->modelNumber = $mn;
    }

    public void setSerialNumber( $sn )
    {
      $this->serialNumber = $sn;
    }

    public void setPrice( $nprice )
    {
      $this->price = $nprice;
    }

    public void setCreatedAt( $ca )
    {
      $this->created_at = $ca;
    }
}
