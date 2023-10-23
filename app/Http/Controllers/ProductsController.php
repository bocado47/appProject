<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Products = Products::all();
        
        return view('admin/products')->with('data',$Products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.forms.addProductForm');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $product = Products::where('id', $request->id)->get()->first();
        return view('admin.forms.editProductForm',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $products = Products::find($request->id);
        $products->delete();
        return redirect()->route('productTable')->with('success','Products has been deleted successfully');
    }
}
