<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Slider;
use App\Models\Advertise;
use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobSeeker;
use App\Models\Partner;
use App\Models\Setting;
use App\Models\Type;
use Illuminate\Http\Response;
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
        $partners = Partner::query()->where('status', 1)->get();
        $advertise = Advertise::query()->where('status', 1)->inRandomOrder()->take(1)->first();
        $companies = Company::query()->count();
        $job_seekers = JobSeeker::query()->count();
        $posts_count = Job::query()->count();
        $posts = Job::query()->active()->take(9)->orderByDesc('is_super_post')->get();

        $setting = Setting::query()->first();
        return view('frontend.jobsldn.home',
            compact('sliders', 'posts',
                'companies', 'job_seekers', 'posts_count', 'partners', 'advertise', 'setting'));
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
        return redirect()->route('home.index');
    }

    public function setCookies(Request $request)
    {

        if ($request->has('accept')) {
            $response = new Response('Set Cookie');
            $response->cookie(cookie('nishan-cookie', 'MyValue', 129500));
            return $response;
        }

        return false;
    }

}
