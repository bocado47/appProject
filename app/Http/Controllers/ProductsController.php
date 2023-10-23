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
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        



        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
           //  print_r($image);
           $image_name = $image->getClientOriginalName();
           //  echo $image;
           //  exit(0);
            $destinationPath = public_path('assets\img\products');
            // dd($destinationPath);
            $image->move($destinationPath, $image_name);
            Products::create($request->post()  + ['image_url' => $image_name]);

        return redirect()->route('productTable')->with('success','Products has been created successfully.');
          } 
            else {                          

            // echo $request;
             }

       
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
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $products = Products::find($request->id);
        // dd($request->image_url->getClientOriginalName());
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
           //  print_r($image);
            $image_name = $image->getClientOriginalName();
           //  echo $image;
           //  exit(0);
            $destinationPath = public_path('assets\img\products');
            // dd($destinationPath);
            $image->move($destinationPath, $image_name);
            $products->update([
                'name' => $request->name,
                'details' => $request->details,
                'main_price' => $request->main_price,
                'stocks' => $request->stocks,
                'image_url' => $image_name,
            ]);
            // $products->fill($request->post())->save();
    
            return redirect()->route('productTable')->with('success','Products has been updated successfully.');
          } 
            else {                          

            // echo $request;
             }
   
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
