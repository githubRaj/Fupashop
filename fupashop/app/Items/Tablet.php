<?php

namespace App\Items;

//use Item;

class Tablet{
    //protected $table = 'tablets';
    protected $fillable = [
        'modelNumber', 'brandName', 'price', 'weight','displaySize', 'dimensions', 'screenSize','ramSize','cpucores','hddSize','batteryInformation','operatingSystem','cameraInformation',
    ];  
}
