<?php

namespace App\Http\Controllers\Admin\Type;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $types = Type::query()->get();
        return view('dashboard.admin.type.index', compact('types'));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Type::query()->create($request->all());
        return redirect()->route('admin.types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Type $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Type $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Type $type
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Type $type)
    {
        $type->update($request->all());
        return redirect()->route('admin.types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Type $type
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index');
    }
}
