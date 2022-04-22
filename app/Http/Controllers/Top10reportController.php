<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\medicine_consumption;
use DB;

class Top10reportController extends Controller
{
    public function index(){

        // $complaints = DB::table('complaints')->latest()->take(10)->get();

        
        $complaints =  DB::table('complaints')
        ->select('complaint', DB::raw('COUNT(*) AS cnt'))
        ->groupBy('complaint')
        ->orderByRaw('COUNT(*) DESC')
        ->whereNotNull('complaint')
        ->where('complaint' , '!=', 'severe')
        ->take(10)
        ->get();

        $other_complaints =  DB::table('complaints')
        ->select('other', DB::raw('COUNT(*) AS cnt'))
        ->groupBy('other')
        ->orderByRaw('COUNT(*) DESC')
        ->whereNull('complaint')
        ->take(10)
        ->get();
        
        // $medicine_consumption = DB::table('medicine_consumptions')
        // ->select('id', DB::raw('COUNT(*) AS cnt'))
        // ->groupBy('id')
        // ->orderByRaw('COUNT(id) DESC')
        // ->get(sum('comsume'));
        
        $medicine_consumptions = medicine_consumption::with('medicine')
        ->select('medicine_id',DB::raw('SUM(consume) as total_consume'))
        ->groupBy('medicine_id')
        ->orderBy('total_consume','desc')
        ->take('10')
        ->get();



        $illnesses =  DB::table('patient_diagnoses')
        ->select('ICD_10_diagnosis', DB::raw('COUNT(*) AS cnt'))
        ->groupBy('ICD_10_diagnosis')
        ->orderByRaw('COUNT(*) DESC')
        ->take(10)
        ->get();

        return view('report.top10data.index',compact('complaints','other_complaints','medicine_consumptions','illnesses'));
    }
}
