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
<<<<<<< Updated upstream
     protected $table = 'purchasecollection';
=======
	  protected $table = 'purchasecollection';
>>>>>>> Stashed changes
    protected $fillable = [
         'userID', 'modelNumber', 'serialNumber', 'price', 'created_at',
    ];
}
