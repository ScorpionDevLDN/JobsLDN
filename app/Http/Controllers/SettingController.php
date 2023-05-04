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
        return view('dashboard.admin.setting.index', compact('setting'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
//        dd($request->all());
        Setting::query()->update([
            'terms' => $request->terms,
            'privacy' => $request->privacy,
            'enable_s3' => $request->enable_s3,
            's3_key' => $request->s3_key,
            's3_secret' => $request->s3_secret,
            's3_region' => $request->s3_region,
            's3_bucket' => $request->s3_bucket,
        ]);
        $requestData = $request->all();
        if ($request->logo) {
            $filename = $request->logo->store('public');
            $imagename = $request->logo->hashName();
            $requestData['logo'] = $imagename;
        }
        if ($request->cover) {
            $filename = $request->cover->store('public');
            $imagename = $request->cover->hashName();
            $requestData['cover'] = $imagename;
        }
        if ($request->email_logo) {
            $filename = $request->email_logo->store('public');
            $imagename = $request->email_logo->hashName();
            $requestData['email_logo'] = $imagename;
        }
        if ($request->icon_logo) {
            $filename = $request->icon_logo->store('public');
            $imagename = $request->icon_logo->hashName();
            $requestData['icon_logo'] = $imagename;
        }
        Setting::query()->findOrFail($id)->update($requestData);
        return redirect()->route('admin.settings.index')->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateLogo(Request $request)
    {
        $requestData = $request->logo;
        if ($request->logo) {
            $fileName = $request->logo->store("setting");
            $imageName = $request->logo->hashName();
            $requestData['logo'] = $imageName;
        }
        Setting::query()->update($requestData);

        return Setting::all();
    }

    public function guideS3()
    {
        return view('dashboard.admin.setting.s3');
    }
}
