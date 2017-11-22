<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Purchase;
use App\Serial;
use App\Mapper\Mapper;

class UsersController extends Controller
{
    private $mapper;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->mapper = new Mapper();
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

    // User Return Item via SN
    public function return(Request $request)
    {
      $this->mapper->handleReturn( $request->SN );
      $purchases = \App\Purchase::where('userID', Auth::id() )->get();
      return view('users.past', compact('purchases'));
    }

}
