<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterAndLoginController extends Controller
{
    public function register(Request $request)
    {
        if (\request()->has('job_seeker')) {
            //Validate inputs
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:job_seekers,email',
                'confirm_email' => 'required|email|unique:job_seekers,email',
                'password' => 'required|min:5|max:30',
                'confirm_password' => 'required|min:5|max:30|same:password',
                'read_conditions' => 'required',
            ]);

            $creds = $request->only('email', 'password');

            JobSeeker::query()->create($request->all());

            if (Auth::guard('job_seekers')->attempt($creds)) {
                return redirect()->route('job_seeker.home');
            } else {
                return redirect()->back()->with('fail', 'Something went Wrong, failed to register');
            }
        } else {
            //Validate inputs
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:job_seekers,email',
                'confirm_email' => 'required|email|unique:job_seekers,email',
                'password' => 'required|min:5|max:30',
                'confirm_password' => 'required|min:5|max:30|same:password',
                'read_conditions' => 'required',
            ]);

            $credentials = $request->only('email', 'password');

            Company::query()->create($request->all());//

            if (Auth::guard('companies')->attempt($credentials)) {
                return redirect()->route('company.home');
            } else {
                return redirect()->back()->with('fail', 'Something went Wrong, failed to register');
            }
        }
    }

    public function login(Request $request)
    {
//        if (){
//            $request->validate([
//                'email' => 'required|email|exists:job_seekers,email',
//                'password' => 'required|min:5|max:30'
//            ], [
//                'email.exists' => 'This email is not exists in job_seekers table'
//            ]);

        $creds = $request->only('email', 'password');

        if (Auth::guard('job_seekers')->attempt($creds)) {
            return redirect()->route('job_seeker.home');
        }
        elseif (Auth::guard('companies')->attempt($creds)) {
            return redirect()->route('company.home');
        } else {
            return redirect()->route('job_seeker.login')->with('fail', 'Incorrect Credentials');
        }
//        }
    }
}
