<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobSeeker;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DatePeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required',
//            'g-recaptcha-response' => 'required|captcha',
        ], [
            'email.required' => 'Email field is required',
            'email.email' => 'Email field should be Email type',
            'email.exists' => 'This email is not match our records ',
            'password.required' => 'Password field is required',
        ]);

        $creds = $request->only('email', 'password');

        $admin = Admin::query()->where('email', $request->email)->first();

        if (Auth::guard('admins')->attempt($creds)) {
            return redirect()->route('admin.home');
        } elseif (!Hash::check($admin->password, $request->password)) {
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
        return redirect()->route('admin.login');
    }

    public function home()
    {
        $companies = Company::query()->count();
        $seekers = JobSeeker::query()->count();
        $jobs = Job::query()->where('status',1)->payment()->count();
        $sales = Job::query()->where('status',1)->where('is_super_post',1)->where('success_payment',1)->count();

        $data_job = [
            test_created(1, 1), test_created(1, 2), test_created(1, 3), test_created(1, 4),
            test_created(1, 5), test_created(1, 6), test_created(1, 7), test_created(1, 8),
            test_created(1, 9), test_created(1, 10), test_created(1, 11), test_created(1, 12),
        ];


        $from = now()->subDays(30)->format('Y-m-d');
        $to = now()->format('Y-m-d');

        $period = CarbonPeriod::create($from, $to);
        $dates = collect($period->toArray())->mapWithKeys(function ($date) {
            return [$date->format('Y-m-d') => 0];
        });

        $uptimeChecks = Job::query()
            ->whereBetween('created_at', [$from, $to])
            ->orderBy('created_at')
            ->get();

        $uptimeDates = $uptimeChecks->groupBy(function ($item, $key) {
            return $item->created_at->format('Y-m-d');
        });
        $keys = $dates->keys();
        $uptimeData = $dates->merge($uptimeDates);

        $data_job_30 = collect($uptimeData)->values()->map(function ($job) {
            return is_countable($job) ? count($job) : 0;
        });

        $fromwWeek = now()->subDays(6)->format('Y-m-d');

        $periodWeek = CarbonPeriod::create($fromwWeek, $to);
        $datesWeek = collect($periodWeek->toArray())->mapWithKeys(function ($date) {
            return [$date->format('Y-m-d') => 0];
        });

        $uptimeChecksWeek = Job::query()
            ->whereBetween('created_at', [$fromwWeek, $to])
            ->orderBy('created_at')
            ->get();

        $uptimeDatesWeek = $uptimeChecksWeek->groupBy(function ($item, $key) {
            return $item->created_at->format('Y-m-d');
        });
        $keysWeek = $datesWeek->keys();
        $uptimeDataWeek = $datesWeek->merge($uptimeDatesWeek);

        $data_job_7 = collect($uptimeDataWeek)->values()->map(function ($job) {
            return is_countable($job) ? count($job) : 0;
        });
//        dump($datesWeek->keys());
//        dd($data_job_7);

        return view('dashboard.admin.home', compact('companies','sales', 'seekers', 'jobs', 'data_job', 'keys', 'data_job_30', 'keysWeek', 'data_job_7'));
    }
}
