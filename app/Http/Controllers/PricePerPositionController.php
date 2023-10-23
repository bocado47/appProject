<?php

namespace App\Http\Controllers;

use App\Models\PricePerPosition;
use App\Models\Position;
use App\Models\Products;
use Illuminate\Http\Request;

class PricePerPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $PricePerPosition = PricePerPosition::query()
                    ->leftJoin('positions','positions.id','price_per_positions.position_id')
                    ->leftJoin('products','products.id','price_per_positions.product_id')
                    ->select(
                        'price_per_positions.id as main_id',
                        'positions.position_name',
                        'products.name as product_name',
                        'price_per_positions.price',
                    )
                    ->get();
        
        return view('admin/PricePerPosition')->with('data',$PricePerPosition);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $position = position::all();
        $Products = Products::all();
        return view('admin.forms.addPricePerPostionForm')->with('position',$position)->with('Products',$Products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'position_id' => 'required',
            'product_id' => 'required',
            'price' => 'required',
        ]);
        
        PricePerPosition::create($request->post());

        return redirect()->route('pricePerPosition')->with('success','Price Per Position has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PricePerPosition $pricePerPosition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $position = position::all();
        $Products = Products::all();

       
        $PricePerPosition = PricePerPosition::where('id', $request->id)->get()->first();

        $position2 = position::find($PricePerPosition->position_id);
        $Products2 = Products::find($PricePerPosition->product_id);


        // print_r($position2);
        return view('admin.forms.editPricePerPostionForm',compact('PricePerPosition','position2','Products2'))->with('position',$position)->with('Products',$Products);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'position_id' => 'required',
            'product_id' => 'required',
            'price' => 'required',
        ]);
        
        $PricePerPosition = PricePerPosition::find($request->id);
        $PricePerPosition->update([
            'position_id' => $request->position_id,
            'product_id' => $request->product_id,
            'price' => $request->price,
        ]);
        // $products->fill($request->post())->save();

        return redirect()->route('pricePerPosition')->with('success','Price Per Position has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $PricePerPosition = PricePerPosition::find($request->id);
        $PricePerPosition->delete();
        return redirect()->route('pricePerPosition')->with('success','Price Per Position has been deleted successfully');
    }
}
