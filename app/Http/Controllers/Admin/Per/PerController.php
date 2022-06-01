<?php

namespace App\Http\Controllers\Admin\Per;

use App\Http\Controllers\Controller;
use App\Models\Per;
use Illuminate\Http\Request;

class PerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pers = Per::query()->get();
        return view('dashboard.admin.Per.index' , compact('pers'));
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
     * @param  \App\Models\Per  $per
     * @return \Illuminate\Http\Response
     */
    public function show(Per $per)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Per  $per
     * @return \Illuminate\Http\Response
     */
    public function edit(Per $per)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Per  $per
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Per $per)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Per  $per
     * @return \Illuminate\Http\Response
     */
    public function destroy(Per $per)
    {
        //
    }
}
