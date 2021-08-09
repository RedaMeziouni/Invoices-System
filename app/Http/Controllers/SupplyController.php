<?php

namespace App\Http\Controllers;

use App\supply;
use App\sections;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sections = sections::all();
        $supply = supply::all();
        return view('supply.supply', compact('sections', 'supply'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        supply::create([
            'supply_name' => $request->supply_name,
            'section_id' => $request->section_id,
            'description' => $request->description,
        ]);
        session()->flash('Add', 'User Added Succesfuly ');
        return redirect('/supply');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function show(supply $supply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function edit(supply $supply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function destroy(supply $supply)
    {
        //
    }
}
