<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine_delivery;
use App\Models\Supplies_delivery;


class MedicineSupplyDeliveryreportController extends Controller
{
    public function index(){

        $deliveries = Medicine_delivery::with('medicine')->get();
        $supply_deliveries = Supplies_delivery::with('supply')->get();
        return view('report.delivery_report.index',compact('supply_deliveries','deliveries'));
    }
}
