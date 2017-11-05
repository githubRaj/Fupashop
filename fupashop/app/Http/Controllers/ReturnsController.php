<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items\Desktop;
use App\Items\Laptop;
use App\Items\Monitor;
use App\Items\Tablet;
use App\Mapper\Mapper;
use App\Items\SerialNumber;

use Session;
use App\Cart;


//Connect to Purchase History View