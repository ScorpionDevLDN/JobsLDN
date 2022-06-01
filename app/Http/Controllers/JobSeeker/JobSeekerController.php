<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class JobSeekerController extends Controller
{
    function create(Request $request)
    {
        //Validate inputs
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:job_seekers,email',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password'
        ]);

        $save = JobSeeker::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //        Auth::guard('job_seekers')->login();

        $creds = $request->only('email', 'password');

        if (Auth::guard('job_seekers')->attempt($creds)) {
            return redirect()->route('job_seeker.home');
        } else {
            return redirect()->back()->with('fail', 'Something went Wrong, failed to register');
        }
    }

    function check(Request $request, $id)
    {
        if ($id == 1) {
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
