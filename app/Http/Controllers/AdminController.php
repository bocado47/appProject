<?php

namespace App\Http\Controllers;

use DB;
use App\Quotation;
use App\Models\User;
use App\Models\users_info;
use App\Models\users_products;
use App\Models\Products;
use Illuminate\Http\Request;
use DataTables;

class AdminController extends Controller
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
        return view('adminDashboard');
    }
    public function userTable()
    {
        $data = User::all();
        return view('admin.users')->withData( $data );
    }

    public function usersProducts(Request $request)
    {
        $data = DB::table('users_products')
            ->where('users_products.user_id',$request->id)
            ->join('users', 'users.id', '=', 'users_products.user_id','left')
            ->join('products', 'products.id', '=', 'users_products.product_id','left')
            ->select('users_products.id AS upid','users_products.*','products.*')
            ->get();
        return view('admin.usersProducts')->withData( $data );
    }
    public function activateUser(Request $request)
    {

        
        users_info::create($request->post());


        $user = User::find($request->user_id);
 
        $user->is_active = true;
        
        $user->save();

        return redirect()->route('userTable')->with('success','User Activated successfully.');
    }

    public function editPrice(Request $request)
    {   
        
        $users_products = users_products::find($request->id);
 
        $users_products->own_price = $request->own_price;
        
        $users_products->save();

        return redirect()->route('userTable')->with('success','Price Updated Successfully.');
    }
}
