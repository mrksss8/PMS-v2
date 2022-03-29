<?php

namespace App\Http\Controllers;

use App\Models\ReqLab;
use Illuminate\Http\Request;

class ReqLabController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReqLab  $reqLab
     * @return \Illuminate\Http\Response
     */
    public function show(ReqLab $reqLab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReqLab  $reqLab
     * @return \Illuminate\Http\Response
     */
    public function edit(ReqLab $reqLab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReqLab  $reqLab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ReqLab = ReqLab::findOrfail($id);

            $labtest_filepath = $request->file($ReqLab->labtest);
            $labtest_fileName = $labtest_filepath->getClientOriginalName();
            $labtest_path = $request->file($ReqLab->labtest)->storeAs('labtest', $labtest_fileName, 'public');

        $ReqLab->filename = $labtest_fileName;
        $ReqLab->path = $labtest_path;

        $ReqLab->save();
        
     
        
         return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReqLab  $reqLab
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReqLab $reqLab)
    {
        //
    }
}
