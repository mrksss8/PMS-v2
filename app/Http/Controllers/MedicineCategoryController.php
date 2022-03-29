<?php

namespace App\Http\Controllers;

use App\Models\MedicineCategory;
use Illuminate\Http\Request;

class MedicineCategoryController extends Controller
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
        $med_category = MedicineCategory::create([
            'category_name' => $request->category
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicineCategory  $medicineCategory
     * @return \Illuminate\Http\Response
     */
    public function show(MedicineCategory $medicineCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicineCategory  $medicineCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicineCategory $medicineCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicineCategory  $medicineCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicineCategory $medicineCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicineCategory  $medicineCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicineCategory $medicineCategory)
    {
        //
    }
}
