<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobSeekerController extends Controller
{
    public function createJobSeeker(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:job_seekers,email',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password',
//                'read_conditions' => 'required|in:1',
        ]);

        $save = JobSeeker::query()->create($request->only('first_name', 'last_name', 'email', 'confirm_email', 'password'));

        $creds = $request->only('email', 'password');

        if (Auth::guard('job_seekers')->attempt($creds)) {
            Auth::guard('job_seekers')->login($save);
            return redirect()->route('home.index');
        }
        return redirect()->back()->with('fail', 'Something went Wrong, failed to register');

    }

    public function createCompany(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:companies,email',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password',
//                'read_conditions' => 'required|in:1',
        ]);

        $save = Company::query()->create($request->only('first_name', 'last_name', 'email', 'confirm_email', 'password'));

        $creds = $request->only('email', 'password');

        if (Auth::guard('companies')->attempt($creds)) {
            Auth::guard('companies')->login($save);
            return redirect()->route('home.index');
        }
        return redirect()->back()->with('fail', 'Something went Wrong, failed to register');

    }

    function check(Request $request)
    {
        if (JobSeeker::query()->where('email', $request->email)->exists()) {
            //Validate Inputs
            $request->validate([
                'email' => 'required|email|exists:job_seekers,email',
                'password' => 'required|min:5|max:30'
            ], [
                'email.exists' => 'This email is not exists in job_seekers table'
            ]);

            $creds = $request->only('email', 'password');

            if (Auth::guard('job_seekers')->attempt($creds)) {
                return redirect()->route('home.index');
            } else {
                return redirect()->back()->with('fail', 'Something went Wrong, failed to register');
            }
        } elseif (Company::query()->where('email', $request->email)->exists()) {
            //Validate Inputs
            $request->validate([
                'email' => 'required|email|exists:companies,email',
                'password' => 'required|min:5|max:30'
            ], [
                'email.exists' => 'This email is not exists in companies table'
            ]);

            $creds = $request->only('email', 'password');

            if (Auth::guard('companies')->attempt($creds)) {
                return redirect()->route('home.index');
            } else {
                return redirect()->back()->with('fail', 'Something went Wrong, failed to login');
            }
        }
        return redirect()->back()->with('fail', 'Something went Wrong, failed to login');

    }

    function logout()
    {
        Auth::guard('job_seekers')->logout();
        return redirect('/job_seeker/login');
    }
}
