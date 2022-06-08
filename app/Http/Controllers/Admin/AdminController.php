<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobSeeker;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login()
    {
        return view('dashboard.admin.login');
    }
    function check(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email is not exists in admins table'
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::guard('admins')->attempt($creds)) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('admin.login')->with('fail', 'Incorrect credentials');
        }
    }

    function logout()
    {
        Auth::guard('admins')->logout();
        return redirect('/admin/login');
    }

    public function home(){
        $companies= Company::query()->count();
        $seekers= JobSeeker::query()->count();
        $jobs= Job::query()->count();
        $all_jobs = Job::query()->orderBy('created_at')->get()->groupBy(function($t) {
            return Carbon::parse($t->created_at)->format('m');
        });
        $data_job = collect($all_jobs)->values()->map(function ($job)  {
            return $job->count();
        });
//        dd($data_job);
        return view('dashboard.admin.home',compact('companies','seekers','jobs','data_job'));
    }
}
