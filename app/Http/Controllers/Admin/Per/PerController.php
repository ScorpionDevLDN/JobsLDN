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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Per::query()->create($request->all());
        return redirect()->route('admin.pers.index')->with('success', 'Per created successfully');
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Per $per)
    {
        $per->update($request->all());
        return redirect()->route('admin.pers.index')->with('success', 'Per updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Per  $per
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Per $per)
    {
        $per->delete();
        return redirect()->route('admin.pers.index')->with('success', 'Per deleted successfully');
    }

    public function updateCategoryStatus(Per $per){
        $per->update([
            'status' => !$per->status
        ]);
        return redirect()->route('admin.pers.index');
    }

    public function changePerStatus(Request $request){
        $ca = Per::find($request->id);
        $ca->status = $request->status;
        $ca->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
