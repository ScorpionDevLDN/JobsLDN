<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\Mail\CreateAccount;
use App\Models\Company;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class JobSeekerController extends Controller
{
    public function createJobSeeker(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:job_seekers,email|unique:companies,email',
            'confirm_email' => 'required|same:email',
            'password' => 'required|min:8|max:30',
            'cpassword' => 'required|same:password',
            'check' => 'in:1',
        ], [
            'first_name.required' => 'First Name field is required',
            'last_name.required' => 'Last Name field is required',
            'email.required' => 'Email Field is required',
            'email.email' => 'Email or password is incorrect',
            'confirm_email.required' => 'Confirm Email Field is required',
            'confirm_email.same' => 'Email or password is incorrect',
            'email.unique' => 'This email already exists',
            'password.required' => 'Password field is required',
            'password.min' => 'Password should be at least 8 letters',
            'password.max' => 'Password should be less than 30 letters',
            'cpassword.required' => 'Confirm Password filed is required',
            'cpassword.same' => 'Email or password is incorrect',
            'check.in' => 'You have to read Terms and condition.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages(),
            ]);
        }

        $save = JobSeeker::query()->create($request->only('first_name', 'last_name', 'email', 'confirm_email', 'password'));

        $creds = $request->only('email', 'password');

        if (Auth::guard('job_seekers')->attempt($creds)) {
            Auth::guard('job_seekers')->login($save);
            Mail::to(auth('job_seekers')->user()->email)->send(new CreateAccount());
            return redirect()->route('myHome')->with('success', 'Your account has been created successfully');
        }
        return redirect()->back()->with('fail', 'Something went Wrong, failed to register');

    }

    public function createCompany(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:job_seekers,email|unique:companies,email',
            'confirm_email' => 'required|same:email',
            'password' => 'required|min:8|max:30|confirmed',
            //'cpassword' => 'required|same:password',
            'check' => 'in:1',
        ], [
            'first_name.required' => 'First Name field is required',
            'last_name.required' => 'Last Name field is required',
            'email.required' => 'Email Field is required',
            'email.email' => 'Email or password is incorrect',
            'confirm_email.required' => 'Confirm Email Field is required',
            'confirm_email.email' => 'Email or password is incorrect',
            'email.unique' => 'This email already exists',
            'password.required' => 'Password field is required',
            'password.min' => 'Password should be at least 8 letters',
            'password.max' => 'Password should be less than 30 letters',
            'cpassword.required' => 'Confirm Password filed is required',
            'password.confirmed' => 'Email or password is incorrect',
            'check.in' => 'You have to read Terms and condition.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages(),
            ]);
        }

        $save = Company::query()->create($request->only('first_name', 'last_name', 'email', 'confirm_email', 'password'));

        $creds = $request->only('email', 'password');

        if (Auth::guard('companies')->attempt($creds)) {
            Auth::guard('companies')->login($save);
            Mail::to(auth('companies')->user()->email)->send(new CreateAccount());
            return redirect()->route('myHome')->with('success', 'Your account has been created successfully');;
        }
        return redirect()->back()->with('fail', 'Something went Wrong, failed to register');

    }

    function check(Request $request)
    {

        $messages = [
            'email.required' => 'Email field is required',
            'email.email' => 'Email field should be email type',
            'password.required' => 'Password field is required',
        ];
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ],$messages);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages(),
            ]);
        }

        if (JobSeeker::query()->where('email', $request->email)->where('is_deleted', 0)->exists()) {
            $job_seeker = JobSeeker::query()->where('email', $request->email)->where('is_deleted', 0)->first();

            $creds = $request->only('email', 'password');

            if (Auth::guard('job_seekers')->attempt($creds)) {
                return redirect()->route('myHome')->with('success', 'You have been login successfully');
            } elseif (!Hash::check($job_seeker->password, $request->password)) {
                return response()->json([
                    'error' => [
                        'password' => "Your password didn't match our record"
                    ]
                ]);
            }
        } elseif (Company::query()->where('email', $request->email)->where('is_deleted', 0)->exists()) {
            $company = Company::query()->where('email', $request->email)->where('is_deleted', 0)->first();
            $creds = $request->only('email', 'password');

            if (Auth::guard('companies')->attempt($creds)) {
                return redirect()->route('myHome')->with('success', 'You have been login successfully');
            } elseif (!Hash::check($company->password, $request->password)) {
                return response()->json([
                    'error' => [
                        'password' => "Your password didn't match our record"
                    ]
                ]);
            }
        }
        return response()->json([
            'error' => [
                'email' => 'This email does not exist!'
            ]
        ]);

    }

    function logout()
    {
        Auth::guard('job_seekers')->logout();
        return redirect('/job_seeker/login');
    }
}
