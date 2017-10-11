<?php

namespace App\Http\Controllers;
use App\Mapper\Mapper;
use Illuminate\Http\Request;
use App\Items\Tablet;
//use App\Http\Controllers\TableDataGatewayController;
class MapperController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function tabletMapper()
    {
         //dont need this controller. will use ProductsController instead. Used for Testing only
        $mapper = new Mapper();
        $tablets = new Tablet();
        $tablets =  $mapper->getTablets();
        return $tablets;
    }
}
