<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobSeekerController extends Controller
{
    function create(Request $request)
    {
        if ($request->type == 'company'){
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
                dd('companies');
                return redirect()->route('job_seeker.home');
            }
            dd('companies22');
            return redirect()->back()->with('fail', 'Something went Wrong, failed to register');
        }else{
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
                dd('job_seeker');
                return redirect()->route('job_seeker.home');
            }
            dd('job_seeker22');
            return redirect()->back()->with('fail', 'Something went Wrong, failed to register');
        }

    }

    function check(Request $request, $id)
    {

        if ($request->accountType == 1) {
            //Validate Inputs
            $request->validate([
                'email' => 'required|email|exists:job_seekers,email',
                'password' => 'required|min:5|max:30'
            ], [
                'email.exists' => 'This email is not exists in job_seekers table'
            ]);

            $creds = $request->only('email', 'password');

            if (Auth::guard('job_seekers')->attempt($creds)) {
                return redirect()->route('job_seeker.home');
            } else {
                return redirect()->route('job_seeker.login')->with('fail', 'Incorrect Credentials');
            }
        } else {
            //Validate inputs
            $request->validate([
                'email' => 'required|email|exists:companies,email',
                'password' => 'required|min:5|max:30'
            ], [
                'email.exists' => 'This email is not exists on users table'
            ]);

            $creds = $request->only('email', 'password');
            if (Auth::guard('companies')->attempt($creds)) {
                return redirect()->route('company.home');
            } else {
                return redirect()->route('company.login')->with('fail', 'Incorrect credentials');
            }
        }
    }

    function logout()
    {
        Auth::guard('job_seekers')->logout();
        return redirect('/job_seeker/login');
    }
}
