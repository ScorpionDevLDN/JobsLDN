<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    public function index()
    {
        $advertises = Advertise::query()->get();
        return view('dashboard.admin.Advertise.index', compact('advertises'));
    }


    public function store(Request $request)
    {
        Advertise::query()->create($request->only(
            'text',
            'image',
            'cta',
            'url'));
        return redirect()->route('admin.advertises.index')->with('msg', 'Advertise Created Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Advertise $Advertise
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Advertise $Advertise)
    {
        $Advertise->update($request->only(
            'text',
            'image',
            'cta',
            'url'));
        return redirect()->route('admin.advertises.index')->with('msg', 'Advertise Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Advertise $Advertise
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Advertise $advertise)
    {
        $advertise->delete();
        return redirect()->route('admin.advertises.index')->with('msg', 'Advertise Deleted Successfully');
    }

    public function updateAdvertiseStatus(Request $request){
        $ca = Advertise::find($request->id);
        $ca->status = $request->status;
        $ca->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
