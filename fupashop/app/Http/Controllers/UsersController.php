<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UsersController extends Controller
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


     /*--------------------------------
    Users  */

    public function pastOrders(){
        $user = User::all();
        return view('users.past', compact('user'));
    }
}
