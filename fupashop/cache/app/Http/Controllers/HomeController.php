<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class HomeController__AopProxied extends Controller
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
    public function index(Request $request)
    {
        return view('home');
    }


     /*--------------------------------
    Users  */

    public function myAccount(){
        $user = User::all();
        return view('users.info', compact('user'));
    }
}

include_once AOP_CACHE_DIR . '/_proxies/app/Http/Controllers/HomeController.php';


