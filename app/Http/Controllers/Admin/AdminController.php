<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobSeeker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

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
            'password' => 'required|min:5|max:30',
//            'g-recaptcha-response' => 'required|captcha',
        ], [
            'email.exists' => 'This email is not exists in admins table'
        ]);

        $creds = $request->only('email', 'password');

        $admin = Admin::query()->where('email',$request->email)->first();

        if (Auth::guard('admins')->attempt($creds)) {
            return redirect()->route('admin.home');
        }
        elseif (!Hash::check($admin->password, $request->password)) {
            return Redirect::route('admin.login')
                ->with('error', 'Your password didnt match our record !')
                ->withInput();
        } else {
//            session()->flash('msg','Password Updated Successfully');
            return redirect()->route('admin.login')->with('error', 'Your password or email didnt match our record !');
        }
    }

    function logout()
    {
        Auth::guard('admins')->logout();
        return redirect('/admin/login');
    }

    public function home()
    {
        $companies = Company::query()->count();
        $seekers = JobSeeker::query()->count();
        $jobs = Job::query()->count();
        $all_jobs = Job::query()->orderBy('created_at')->get()->groupBy(function ($t) {
            return Carbon::parse($t->created_at)->format('m');
        });
        $data_job = collect($all_jobs)->values()->map(function ($job) {
            return $job->count();
        });
//        dd($data_job);
        return view('dashboard.admin.home', compact('companies', 'seekers', 'jobs', 'data_job'));
    }
}
