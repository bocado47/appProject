<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\users_info;
use Auth;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        // $user = users_info::find(auth()->user()->id);
        
                    //   print_r($user);
        if(auth()->user()->is_active)
        {
            return view('home');
        }else{
            Auth::logout();
            return redirect('/login')->with('error','Contact Admin To Activate Your Account');
            
        }            
        // 
    }
}
