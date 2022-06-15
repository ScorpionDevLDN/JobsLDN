<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Currency;
use App\Models\Job;
use App\Models\Per;
use App\Models\Type;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(){
        $cities = City::all();
        $types = Type::all();
        $categories = Category::all();
        $currencies = Currency::all();
        $pers = Per::all();
        $jobs = Job::query()->get();
        return view('dashboard.admin.jobs.index', compact('jobs','cities','types','categories','currencies','pers'));
    }

    public function update(Request $request, $id)
    {
        Job::query()->findOrFail($id)->update($request->all());
        return redirect()->route('admin.get-jobs.index');
    }

    public function accept($id)
    {
        Job::query()->findOrFail($id)->update([
            'status' => 1
        ]);
        return redirect()->route('admin.get-jobs.index');
    }

    public function reject($id)
    {
        Job::query()->findOrFail($id)->update([
            'status' => 2
        ]);
        return redirect()->route('admin.get-jobs.index');
    }
}
