<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'purchasecollection';
    protected $fillable = [
         'userID', 'modelNumber', 'serialNumber', 'price', 'created_at',
    ];
}
