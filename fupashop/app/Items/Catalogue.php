<?php

namespace App\Items;

//use Item;
use Illuminate\Database\Eloquent\Model;
use App\Mapper\Mapper;

class Catalogue
{
    //protected $table = 'tablets';
    private $mapper = new Mapper();
    protected $type;
    protected $fillable = [
        'displaySize', 'dimensions', 'screenSize','ramSize','cpucores','hddSize','batteryInformation','operatingSystem','cameraInformation',
    ];


    public function setType($newType){
    	$type = $newType;
    }
}
