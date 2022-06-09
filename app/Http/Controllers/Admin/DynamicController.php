<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DynamicPage;
use Illuminate\Http\Request;

class DynamicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $pages = DynamicPage::query()->get();
        return view('dashboard.admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('dashboard.admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required|unique:dynamic_pages|max:255',
            'image' => 'required', // بجدول لحالها
            'description' =>'required',
            'content' => 'required',
            'slug' => 'required',
            'keywords' =>'required', // بدها جدول لحالها
            'metadata' => 'required',
        ]);
        DynamicPage::query()->create($validatedData + [
                'shown_in' => $request->shown_in
            ]);
        return redirect()->route('admin.pages.index')->with('msg', 'Page Created Successfully');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $dynamicPage = DynamicPage::query()->where('id',$id)->first();
        return view('dashboard.admin.pages.edit',compact('dynamicPage'));
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
//        $validatedData = $request->validate([
//            'title' => 'required|unique:dynamic_pages|max:255',
////            'image' => 'required', // بجدول لحالها
//            'description' =>'required',
//            'content' => 'required',
//            'slug' => 'required',
//            'keywords' =>'required', // بدها جدول لحالها
//            'metadata' => 'required',
//        ]);
        DynamicPage::query()->findOrFail($id)->update($request->all());
        return redirect()->route('admin.pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy( $id)
    {
        DynamicPage::query()->findOrFail($id)->delete();
        return redirect()->route('admin.pages.index');
    }

    public function updateCategoryStatus($id){
        $page = DynamicPage::query()->findOrFail($id)->first();
        $page->update([
            'status' => !$page->status
        ]);
        return redirect()->route('admin.pages.index');
    }
}
