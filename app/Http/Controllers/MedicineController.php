<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        Medicine::create([
            'medicine_classification' => $request->med_class,
            'brand_name' => $request->brand_name,
            'dosage' => $request->dosage,   
            'source' => $request->source,
            'beginning_stock' => $request->beginning_stock,
            'maintaining_level' => $request->maintaining_level,
            'critical_level' => $request->critical_level,
            'expiration_date' => $request->expiration_date,
            'remarks' => $request->remarks,
            
            //stand as type of medicine
            'category_id' => $request->category,
            
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $medicine = Medicine::findorfail($id);
        
        //add new stack to old stack
        $new_stock = $request->stock + $medicine->beginning_stock;

        $medicine->beginning_stock = $new_stock;
        $medicine->save();
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        //
    }
}
