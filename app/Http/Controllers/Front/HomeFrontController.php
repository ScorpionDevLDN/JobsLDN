<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Slider;
use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobSeeker;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $sliders = Slider::query()->where('status', 1)->get();
//        $sliders = Slider::query()->where('status', 1)->get();
        $companies = Company::query()->count();
        $job_seekers = JobSeeker::query()->count();
        $posts_count = Job::query()->count();
        $posts = Job::query()->where('status', 1)->take(9)->orderByDesc('is_super_post')->get();
        $categories = Category::query()->where('status', 1)->get();
        $cities = City::query()->where('status', 1)->get();
        $types = Type::query()->where('status', 1)->get();
        return view('JobsLdn.home', compact('sliders', 'posts', 'companies', 'job_seekers', 'posts_count', 'categories', 'cities', 'types'));
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function logout(Request $request)
    {
        if (auth()->guard('job_seekers')->check()) {
            auth()->guard('job_seekers')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        } else {
            auth()->guard('companies')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        return redirect('/home');
    }


}
