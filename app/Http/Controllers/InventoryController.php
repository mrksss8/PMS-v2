<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicineCategory;
use App\Models\Medicine;
use App\Models\Supply;

class InventoryController extends Controller
{
    public function index(){

        $medicines = Medicine::with('category')->get();
        $medicince_categories = MedicineCategory::all();

        $supplies = Supply::all();
        return view('inventory.medicineSupply.index',compact('medicince_categories','medicines','supplies'));
    }
}
