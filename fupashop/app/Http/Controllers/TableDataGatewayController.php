<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items\Item;
use App\Items\Tablet;

class TableDataGatewayController extends Controller
{
    /**
                    FOR TESTING PURPOSES ONLY. IS NOT USED IN OVERALL PROJECT
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
    public function test($itemType)
    {
        switch ($itemType) {
            case 'tablets':
                return $this->testItem('LGPADXII8PLUS');
                break;
                
            default:
                # code...
                break;
        }
        //return view('home');
    }


    private function testItem($modNum){
        $tablet = new Tablet();
        //$tablet = Item::where('modelNumber', $modNum)->get();
        $tablet->modelNumber = $modNum;

        return $tablet->modelNumber;
    }
}
