<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\users_info;
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

    public function productTable()
    {
        $data = Products::all();
            
        return view('admin.products')->withData( $data );
    }

    public function add()
    {
        return view('admin.forms.addProductForm');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'details' => 'required',
            'main_price' => 'required',
            'stocks' => 'required',
        ]);
        
        Products::create($request->post());

        return redirect()->route('productTable')->with('success','Products has been created successfully.');
    }

    public function edit(Request $request)
    {
        $product = Products::where('id', $request->id)->get()->first();
        return view('admin.forms.editProductForm',compact('product'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'details' => 'required',
            'main_price' => 'required',
            'stocks' => 'required',
        ]);
        
        $products = Products::find($request->id);
        $products->update([
            'name' => $request->name,
            'details' => $request->details,
            'main_price' => $request->main_price,
            'stocks' => $request->stocks,
        ]);
        // $products->fill($request->post())->save();

        return redirect()->route('productTable')->with('success','Products has been updated successfully.');
    }

    public function delete(Request $request)
    {
        $products = Products::find($request->id);
        $products->delete();
        return redirect()->route('productTable')->with('success','Products has been deleted successfully');
    }
}
