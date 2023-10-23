<?php

namespace App\Http\Controllers;

use App\Models\position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $position = position::all();
        
        return view('admin/position')->with('data',$position);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.forms.addPositionForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'position_name' => 'required',
        ]);
        
        position::create($request->post());

        return redirect()->route('position')->with('success','Position has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(position $position)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $position = position::where('id', $request->id)->get()->first();
        return view('admin.forms.editPositionForm',compact('position'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, position $position)
    {
        $request->validate([
            'position_name' => 'required',
        ]);
        
        $position = position::find($request->id);
        $position->update([
            'position_name' => $request->position_name,
        ]);
        // $products->fill($request->post())->save();

        return redirect()->route('position')->with('success','Position has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $position = Position::find($request->id);
        $position->delete();
        return redirect()->route('position')->with('success','Position has been deleted successfully');
    }
}
