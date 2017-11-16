<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Purchase;

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

    // Users Past Orders
    public function pastOrders(){
        $purchases = \App\Purchase::where('userID', Auth::id() )->get();
        return view('users.past', compact('purchases'));
    }

    public function deleteAccount()
    {
        $user = User::find(Auth::user()->id);
        Auth::logout();
        if ($user->delete()) 
        {
            return back();
        }
    }
        
}
