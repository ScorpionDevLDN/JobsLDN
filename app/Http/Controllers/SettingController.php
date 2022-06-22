<?php

namespace App\Http\Controllers;

use App\Models\Admin\Slider;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $setting = Setting::query()->first();
        $sliders = Slider::query()->get();
        return view('dashboard.admin.setting.index',compact('setting','sliders'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();
        if($request->logo){
            $filename= $request->logo->store('public');
            $imagename= $request->logo->hashName();
            $requestData['logo'] = $imagename;
        }
        if($request->cover){
            $filename= $request->cover->store('public');
            $imagename= $request->cover->hashName();
            $requestData['cover'] = $imagename;
        }
        Setting::query()->findOrFail($id)->update($requestData);
        return redirect()->route('admin.settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateLogo(Request $request){
        $requestData = $request->logo;
        if($request->logo){
            $fileName = $request->logo->store("setting");
            $imageName = $request->logo->hashName();
            $requestData['logo'] = $imageName;
        }
        Setting::query()->update($requestData);

       return Setting::all();
    }
}
