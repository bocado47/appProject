<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\users_products;
use App\Models\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        $products = Products::all();
        
        return view('distributorPages/products')->with('products',$products);
    }

    public function getPrice(Request $request)
    {
        $product_id = $request->product_id;
        $user_id = $request->user_id;

        $where = ['product_id' => $product_id, 'user_id' => $user_id];

        $results = users_products::where($where)->get();

        return response()->json($results);

    }

    public function addToCart(Request $request)
    {

        
        Cart::create($request->post());

        return redirect()->route('products')->with('success','Item has been added to your cart.');
    }
}
