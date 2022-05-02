<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine_delivery;

class MedicineDeliveryreportController extends Controller
{
    public function index(){

        $deliveries = Medicine_delivery::with('medicine')->get();

        return view('report.delivery_report.index',compact('deliveries'));
    }
}
